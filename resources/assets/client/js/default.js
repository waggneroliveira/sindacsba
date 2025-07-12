! function() {
    "use strict";
    let e = document.querySelector("#preloader");

    function t() {
        AOS.init({
            duration: 600,
            easing: "ease-in-out",
            once: !0,
            mirror: !1
        })
    }
    e && window.addEventListener("load", (() => {
        e.remove()
    })), window.addEventListener("load", t);
    let o = document.querySelector(".typed");
    if (o) {
        let e = o.getAttribute("data-typed-items");
        e = e.split(","), new Typed(".typed", {
            strings: e,
            loop: !0,
            typeSpeed: 100,
            backSpeed: 50,
            backDelay: 2e3
        })
    }
    let n = document.querySelector(".scroll-top");
    n.addEventListener("click", (e => {
        e.preventDefault(), window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    })), document.addEventListener("scroll", (function() {
        n && (window.scrollY > 100 ? n.classList.add("active") : n.classList.remove("active"))
    })), document.querySelectorAll(".skills-animation").forEach((e => {
        new Waypoint({
            element: e,
            offset: "80%",
            handler: function(t) {
                e.querySelectorAll(".progress .progress-bar").forEach((e => {
                    e.style.width = e.getAttribute("aria-valuenow") + "%"
                }))
            }
        })
    })), document.querySelectorAll(".isotope-layout").forEach((function(e) {
        let o, n = e.getAttribute("data-layout") ?? "masonry",
            i = e.getAttribute("data-default-filter") ?? "*",
            r = e.getAttribute("data-sort") ?? "original-order";
        imagesLoaded(e.querySelector(".isotope-container"), (function() {
            o = new Isotope(e.querySelector(".isotope-container"), {
                itemSelector: ".isotope-item",
                layoutMode: n,
                filter: i,
                sortBy: r
            })
        })), e.querySelectorAll(".isotope-filters li").forEach((function(n) {
            n.addEventListener("click", (function() {
                e.querySelector(".isotope-filters .filter-active").classList.remove("filter-active"), this.classList.add("filter-active"), o.arrange({
                    filter: this.getAttribute("data-filter")
                }), t()
            }), !1)
        }))
    })), window.addEventListener("load", (function() {
        document.querySelectorAll(".init-swiper").forEach((function(e) {
            let t = JSON.parse(e.querySelector(".swiper-config").innerHTML.trim());
            e.classList.contains("swiper-tab") ? initSwiperWithCustomPagination(e, t) : new Swiper(e, t)
        }))
    })), window.addEventListener("load", (function(e) {
        window.location.hash && document.querySelector(window.location.hash) && setTimeout((() => {
            let e = document.querySelector(window.location.hash),
                t = getComputedStyle(e).scrollMarginTop;
            window.scrollTo({
                top: e.offsetTop - parseInt(t),
                behavior: "smooth"
            })
        }), 100)
    }));
    let i = document.querySelectorAll(".navmenu a");

    function r() {
        i.forEach((e => {
            if (!e.hash) return;
            let t = document.querySelector(e.hash);
            if (!t) return;
            let o = window.scrollY + 200;
            o >= t.offsetTop && o <= t.offsetTop + t.offsetHeight ? (document.querySelectorAll(".navmenu a.active").forEach((e => e.classList.remove("active"))), e.classList.add("active")) : e.classList.remove("active")
        }))
    }
    window.addEventListener("load", r), document.addEventListener("scroll", r), window.addEventListener("load", (function() {
        document.addEventListener("scroll", (function() {
            let e = document.querySelector(".laptop-parallax");
            if (!e) return;
            let t = document.querySelector(".content-project"),
                o = t.getBoundingClientRect().top;
            if (o < window.innerHeight && o > -t.offsetHeight) {
                let t = .3 * o;
                t = Math.max(-15, Math.min(15, t)), e.style.transform = `translateY(${t}px)`
            }
        }))
    }));
    let y = document.getElementById("stars-container");
    if (y) {
        for (let i = 0; i < 5; i++) {
            let star = document.createElement("img");
            star.src = "build/client/images/star.svg";
            star.alt = "Estrela Rating";
            star.title = "Estrela Rating";
            y.appendChild(star);
        }
    }

    function l() {
        if (window.innerWidth <= 885) {
            document.querySelectorAll("[data-aos]").forEach((e => {
                e.removeAttribute("data-aos"), e.removeAttribute("data-aos-delay"), e.classList.remove("aos-animate", "aos-init")
            }));
            let e = document.createElement("style");
            e.innerHTML = "\n              \n          ", document.head.appendChild(e), "undefined" != typeof AOS && AOS.refresh && AOS.refresh()
        }
    }
    document.addEventListener("DOMContentLoaded", l), window.addEventListener("resize", l),
        document.addEventListener("DOMContentLoaded", (function() {
            document.querySelectorAll('a[href^="#"]').forEach((function(e) {
                e.addEventListener("click", (function(e) {
                    e.preventDefault();
                    let t = this.getAttribute("href");
                    if (t.length > 1) {
                        let e = document.querySelector(t);
                        e && window.scrollTo({
                            top: e.offsetTop,
                            behavior: "smooth"
                        })
                    } else window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    })
                }))
            }))
        }))

    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.main-swiper', {
            loop: true,
            speed: 1200,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });

        const swiperAnuncio = new Swiper('.announcement', {
            loop: true,
            speed: 1200,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });
    });

    if (document.getElementById('socialLinks')) {
        document.getElementById('shareBtn').addEventListener('click', function() {
            const links = document.getElementById('socialLinks');
            links.classList.toggle('opacity-0');
        });
    }

    //Menu mobile
    const s = document.getElementById("menu-toggle"),
        a = document.getElementById("menu-mobile"),
        c = document.getElementById("menu-close");

    s.addEventListener("click", (function() {
        const e = a.classList.toggle("active");
        document.body.style.overflow = e ? "hidden" : ""
    }));

    c.addEventListener("click", (function() {
        a.classList.remove("active");
        document.body.style.overflow = ""
    }));


    a.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function(e) {
            const href = this.getAttribute("href");
            if (href && href.startsWith("#")) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: "smooth" });
                }
                a.classList.remove("active");
                document.body.style.overflow = "";
            }
        });
    });


}();