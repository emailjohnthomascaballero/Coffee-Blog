"use strict";
var blogauthor = blogauthor || {};

let loadButtonWrapper = document.querySelector(".blogauthor-load-posts-btn-wrapper");
let loadButton = document.querySelector(
    ".blogauthor-load-posts-btn-wrapper .load-btn"
);
let loader = document.querySelector(".blogauthor-ajax-loader");

let loadType = loadButtonWrapper.getAttribute("data-load-type");
let articleWrapper = document.querySelector(".blogauthor-article-wrapper");

let currentPage = parseInt(loadButtonWrapper.getAttribute("data-page"));
let nextPage = currentPage + 1;
let maxPage = parseInt(loadButtonWrapper.getAttribute("data-max-pages"));

let canBeLoaded = true;
let rootElement = document.documentElement;

blogauthor.ajaxloadPosts = {
    init: function () {
        let _this = this;

        if (loadButtonWrapper) {
            // Load Posts on Click.
            if ("ajax_load_on_click" == loadType) {
                loadButtonWrapper.style.display = "block";
                loadButton.addEventListener("click", function (e) {
                    e.preventDefault();
                    _this.fetchThePosts();
                });
            }

            // Load Posts on Scroll.
            if ("ajax_load_on_scroll" == loadType) {
                loadButtonWrapper.style.display = "block";
                loadButton.style.display = "none";

                window.addEventListener("scroll", function (event) {
                    let btnOffsetTop =
                        loadButtonWrapper.getBoundingClientRect().top +
                        window.scrollY;

                    let offset = btnOffsetTop - rootElement.scrollTop;
                    if (nextPage <= maxPage) {
                        if (700 > offset && canBeLoaded) {
                            _this.fetchThePosts();
                        }
                    }
                });
            }
        }
    },

    fetchThePosts: function () {
        loadButton.style.display = "none";
        loader.classList.add("active");
        canBeLoaded = false;

        fetch(BlogauthorVars.ajaxurl, {
            method: "POST",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Cache-Control": "no-cache",
            },
            body: new URLSearchParams({
                action: "blogauthor_load_posts",
                nonce: BlogauthorVars.nonce,
                query_vars: BlogauthorVars.query_vars,
                page: nextPage,
            }),
        })
            .then((response) => {
                return response.json();
            })
            .then((res) => {
                if (res.success) {
                    loader.classList.remove("active");
                    let fetchedContent = res.data.content;

                    // Append the content.
                    articleWrapper.insertAdjacentHTML(
                        "beforeend",
                        fetchedContent
                    );

                    currentPage = nextPage;
                    nextPage++;

                    if (nextPage <= maxPage) {
                        if ("ajax_load_on_click" == loadType) {
                            loadButton.style.display = "block";
                        }
                    } else {
                        loadButtonWrapper.style.display = "none";
                    }

                    canBeLoaded = true;
                } else {
                    loader.classList.remove("active");
                }
            })
            .catch((error) => {
                console.log(error);
            });
    },
};

blogauthorDomReady(function () {
    blogauthor.ajaxloadPosts.init();
});
