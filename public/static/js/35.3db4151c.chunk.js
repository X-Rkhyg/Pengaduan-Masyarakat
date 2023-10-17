    (this["webpackJsonpvuexy-react-admin-dashboard"] =
    this["webpackJsonpvuexy-react-admin-dashboard"] || []).push([
    [35],
    {
        423: function (e, t, n) {
        "use strict";
        n.r(t);
        var c = n(6),
            a = n(11),
            s = n(1),
            r = n(121),
            i = n(51),
            l = n(49),
            j = n(5),
            o = n(123),
            b = n(52),
            d = n(19),
            u = n(7),
            h = n(43),
            O = n(124),
            x = n(125),
            m = n(126),
            f = n(50),
            v = n.n(f),
            p = n(10),
            g = "{pushname}",
            k = "{prefix}",
            y = "{namebot}",
            w = "{ucapan}",
            N = "{tanggal}",
            U = "{sender}",
            G = "{limit}",
            T = "{balance}",
            A = "{status}",
            S = "{runtime}",
            J = "{wib}",
            C = "{wita}",
            B = "{wit}",
            F = "{hari}",
            P = "{level}",
            z = "{tier}",
            E = "{xp}",
            L = "{maxXp}",
            M = function (e) {
            var t = e.axiosJwt,
                n = Object(s.useState)(!1),
                c = Object(u.a)(n, 2),
                a = c[0],
                r = c[1],
                i = x.e().shape({ menu: x.g().required() }),
                l = Object(O.f)({
                mode: "onChange",
                resolver: Object(m.a)(i),
                defaultValues: { menu: "" },
                }),
                j = l.control,
                b = l.formState.errors,
                f = l.handleSubmit,
                M = l.setValue;
            Object(s.useEffect)(function () {
                t.get("".concat(o.a, "/user/menu")).then(function (e) {
                return M("menu", e.data.result || "");
                });
            }, []);
            return Object(p.jsx)(h.h, {
                children: Object(p.jsxs)(h.i, {
                children: [
                    Object(p.jsx)(h.n, {
                    tag: "h4",
                    className: "mb-1",
                    children: "Edit Menu",
                    }),
                    Object(p.jsxs)(h.J, {
                    children: [
                        Object(p.jsx)(h.o, {
                        xl: 6,
                        children: Object(p.jsxs)(h.t, {
                            onSubmit: f(function (e) {
                            r(!0),
                                t
                                .post("".concat(o.a, "/user/menu"), {
                                    text: e.menu,
                                })
                                .then(function (e) {
                                    r(!1), v.a.success(e.data.message);
                                })
                                .catch(function (e) {
                                    var t, n;
                                    r(!1),
                                    v.a.error(
                                        null === e ||
                                        void 0 === e ||
                                        null === (t = e.response) ||
                                        void 0 === t ||
                                        null === (n = t.data) ||
                                        void 0 === n
                                        ? void 0
                                        : n.message
                                    );
                                });
                            }),
                            children: [
                            Object(p.jsxs)("div", {
                                className: "mb-1",
                                children: [
                                Object(p.jsx)(O.a, {
                                    id: "menu",
                                    name: "menu",
                                    control: j,
                                    render: function (e) {
                                    var t = e.field;
                                    return Object(p.jsx)(
                                        h.v,
                                        Object(d.a)(
                                        Object(d.a)({}, t),
                                        {},
                                        {
                                            invalid: b.menu && !0,
                                            type: "textarea",
                                            style: { height: "300px" },
                                        }
                                        )
                                    );
                                    },
                                }),
                                b.menu &&
                                    Object(p.jsx)(h.u, {
                                    children: b.menu.message,
                                    }),
                                ],
                            }),
                            Object(p.jsxs)("div", {
                                className: "mb-2",
                                children: [
                                a
                                    ? Object(p.jsxs)(h.f, {
                                        variant: "primary",
                                        disabled: !0,
                                        children: [
                                        Object(p.jsx)(h.K, {
                                            as: "span",
                                            animation: "grow",
                                            size: "sm",
                                            role: "status",
                                            "aria-hidden": "true",
                                        }),
                                        "Loading...",
                                        ],
                                    })
                                    : Object(p.jsx)(h.f, {
                                        type: "submit",
                                        color: "primary",
                                        className: "me-1",
                                        children: "Submit",
                                    }),
                                Object(p.jsx)(h.f, {
                                    color: "danger",
                                    onClick: function () {
                                    t.delete("".concat(o.a, "/user/menu"))
                                        .then(function (e) {
                                        M("menu", ""), v.a.success(e.data.result);
                                        })
                                        .catch(function (e) {
                                        var t, n;
                                        v.a.error(
                                            null === e ||
                                            void 0 === e ||
                                            null === (t = e.response) ||
                                            void 0 === t ||
                                            null === (n = t.data) ||
                                            void 0 === n
                                            ? void 0
                                            : n.message
                                        );
                                        });
                                    },
                                    children: "Reset Menu",
                                }),
                                ],
                            }),
                            ],
                        }),
                        }),
                        Object(p.jsx)(h.o, {
                        xl: 6,
                        children: Object(p.jsxs)("ul", {
                            children: [
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: g }),
                                " Untuk Nama pengguna",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: k }),
                                " Untuk Prefix Bot",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: y }),
                                " Untuk Nama Bot",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: w }),
                                ' Untuk Ucapan seperti "Pagi"',
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: N }),
                                " Untuk Tanggal",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: J }),
                                " Untuk Jam WIB",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: C }),
                                " Untuk Jam WITA",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: B }),
                                " Untuk Jam WIT",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: U }),
                                " Untuk Nomor Pengirim",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: G }),
                                " Untuk Limit",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: T }),
                                " Untuk Balance",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: A }),
                                " Untuk Status (Owner|Premium|Free)",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: S }),
                                " Untuk Runtime",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: F }),
                                " Untuk hari",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: P }),
                                " Untuk level",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: z }),
                                " Untuk tier",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: E }),
                                " Untuk xp",
                                ],
                            }),
                            Object(p.jsxs)("li", {
                                children: [
                                "Gunakan ",
                                Object(p.jsx)("b", { children: L }),
                                " Untuk Max Xp",
                                ],
                            }),
                            ],
                        }),
                        }),
                    ],
                    }),
                ],
                }),
            });
            },
            V =
            (n(140),
            function (e) {
                var t = e.axiosJwt,
                n = Object(s.useState)(!1),
                c = Object(u.a)(n, 2),
                a = c[0],
                r = c[1],
                i = Object(s.useState)(""),
                l = Object(u.a)(i, 2),
                j = l[0],
                b = l[1],
                f = Object(s.useState)(!1),
                g = Object(u.a)(f, 2),
                k = g[0],
                y = g[1],
                w = Object(s.useState)(!1),
                N = Object(u.a)(w, 2),
                U = N[0],
                G = N[1],
                T = x
                    .e()
                    .shape({
                    type: x.g().required(),
                    title: x.g(),
                    body: x.g(),
                    large: x.b(),
                    showAd: x.b(),
                    url: x.g(),
                    }),
                A = Object(O.f)({
                    mode: "onChange",
                    resolver: Object(m.a)(T),
                    defaultValues: {
                    type: "",
                    title: "",
                    body: "",
                    large: !1,
                    showAd: !1,
                    url: "",
                    },
                }),
                S = A.control,
                J = A.formState.errors,
                C = A.handleSubmit,
                B = A.setValue;
                Object(s.useEffect)(function () {
                t.get("".concat(o.a, "/user/typemenu")).then(function (e) {
                    (e = e.data.result), b(e.type);
                    for (var t = 0, n = Object.entries(e); t < n.length; t++) {
                    var c = Object(u.a)(n[t], 2),
                        a = c[0],
                        s = c[1];
                    B(
                        a,
                        "showAd" === a || "large" === a ? !!s : null === s ? "" : s
                    ),
                        "showAd" === a && G(!!s),
                        "large" === a && y(!!s);
                    }
                });
                }, []);
                return Object(p.jsx)(h.h, {
                children: Object(p.jsxs)(h.i, {
                    children: [
                    Object(p.jsx)(h.n, {
                        tag: "h4",
                        className: "mb-1",
                        children: "Type Menu",
                    }),
                    Object(p.jsxs)(h.t, {
                        onSubmit: C(function (e) {
                        r(!0),
                            t
                            .post("".concat(o.a, "/user/typemenu"), e)
                            .then(function (e) {
                                r(!1), v.a.success(e.data.message);
                            })
                            .catch(function (e) {
                                var t, n;
                                r(!1),
                                v.a.error(
                                    null === e ||
                                    void 0 === e ||
                                    null === (t = e.response) ||
                                    void 0 === t ||
                                    null === (n = t.data) ||
                                    void 0 === n
                                    ? void 0
                                    : n.message
                                );
                            });
                        }),
                        id: "formType",
                        children: [
                        Object(p.jsxs)("div", {
                            className: "mb-1",
                            children: [
                            Object(p.jsxs)(h.y, {
                                className: "form-label",
                                for: "type",
                                children: [
                                "Type",
                                Object(p.jsx)("font", {
                                    color: "FF7F7F",
                                    children: "*",
                                }),
                                ],
                            }),
                            Object(p.jsx)(O.a, {
                                id: "type",
                                name: "type",
                                control: S,
                                render: function (e) {
                                var t = e.field;
                                return Object(p.jsxs)(
                                    h.v,
                                    Object(d.a)(
                                    Object(d.a)({}, t),
                                    {},
                                    {
                                        invalid: J.type && !0,
                                        type: "select",
                                        onChange: function (e) {
                                        e && b(e.target.value), t.onChange(e);
                                        },
                                        children: [
                                        Object(p.jsx)("option", {
                                            children: "text",
                                        }),
                                        Object(p.jsx)("option", {
                                            children: "image",
                                        }),
                                        Object(p.jsx)("option", {
                                            children: "location",
                                        }),
                                        Object(p.jsx)("option", {
                                            children: "thumbnail",
                                        }),
                                        ],
                                    }
                                    )
                                );
                                },
                            }),
                            J.type &&
                                Object(p.jsx)(h.u, { children: J.type.message }),
                            ],
                        }),
                        "thumbnail" === j &&
                            Object(p.jsxs)("div", {
                            children: [
                                Object(p.jsxs)("div", {
                                className: "mb-1",
                                children: [
                                    Object(p.jsx)(h.y, {
                                    className: "form-label",
                                    for: "title",
                                    children: "Title",
                                    }),
                                    Object(p.jsx)(O.a, {
                                    id: "title",
                                    name: "title",
                                    control: S,
                                    render: function (e) {
                                        var t = e.field;
                                        return Object(p.jsx)(
                                        h.v,
                                        Object(d.a)(
                                            Object(d.a)({}, t),
                                            {},
                                            { invalid: J.title && !0 }
                                        )
                                        );
                                    },
                                    }),
                                    J.title &&
                                    Object(p.jsx)(h.u, {
                                        children: J.title.message,
                                    }),
                                ],
                                }),
                                Object(p.jsxs)("div", {
                                className: "mb-1",
                                children: [
                                    Object(p.jsx)(h.y, {
                                    className: "form-label",
                                    for: "body",
                                    children: "Body",
                                    }),
                                    Object(p.jsx)(O.a, {
                                    id: "body",
                                    name: "body",
                                    control: S,
                                    render: function (e) {
                                        var t = e.field;
                                        return Object(p.jsx)(
                                        h.v,
                                        Object(d.a)(
                                            Object(d.a)({}, t),
                                            {},
                                            { invalid: J.body && !0 }
                                        )
                                        );
                                    },
                                    }),
                                    J.body &&
                                    Object(p.jsx)(h.u, {
                                        children: J.body.message,
                                    }),
                                ],
                                }),
                                Object(p.jsxs)("div", {
                                className: "mb-1",
                                children: [
                                    Object(p.jsx)(h.y, {
                                    className: "form-label",
                                    for: "url",
                                    children: "Url",
                                    }),
                                    Object(p.jsx)(O.a, {
                                    id: "url",
                                    name: "url",
                                    control: S,
                                    render: function (e) {
                                        var t = e.field;
                                        return Object(p.jsx)(
                                        h.v,
                                        Object(d.a)(
                                            Object(d.a)({}, t),
                                            {},
                                            { invalid: J.url && !0 }
                                        )
                                        );
                                    },
                                    }),
                                    J.url &&
                                    Object(p.jsx)(h.u, {
                                        children: J.url.message,
                                    }),
                                ],
                                }),
                                Object(p.jsxs)(h.J, {
                                children: [
                                    Object(p.jsx)(h.o, {
                                    sm: "6",
                                    children: Object(p.jsx)("div", {
                                        className: "mb-1",
                                        children: Object(p.jsxs)("div", {
                                        className: "form-check form-switch",
                                        children: [
                                            Object(p.jsx)(O.a, {
                                            id: "large",
                                            name: "large",
                                            control: S,
                                            render: function (e) {
                                                var t = e.field;
                                                return Object(p.jsx)(
                                                h.v,
                                                Object(d.a)(
                                                    Object(d.a)({}, t),
                                                    {},
                                                    {
                                                    type: "switch",
                                                    name: "large",
                                                    invalid: J.large && !0,
                                                    checked: k,
                                                    onChange: function (e) {
                                                        var n;
                                                        y(
                                                        !(
                                                            null === e ||
                                                            void 0 === e ||
                                                            null ===
                                                            (n = e.target) ||
                                                            void 0 === n ||
                                                            !n.checked
                                                        )
                                                        ),
                                                        t.onChange(e);
                                                    },
                                                    }
                                                )
                                                );
                                            },
                                            }),
                                            J.large &&
                                            Object(p.jsx)(h.u, {
                                                children: J.large.message,
                                            }),
                                            Object(p.jsx)(h.y, {
                                            className: "form-check-label",
                                            for: "large",
                                            children: "Large",
                                            }),
                                        ],
                                        }),
                                    }),
                                    }),
                                    Object(p.jsx)(h.o, {
                                    sm: "6",
                                    children: Object(p.jsx)("div", {
                                        className: "mb-1",
                                        children: Object(p.jsxs)("div", {
                                        className: "form-check form-switch",
                                        children: [
                                            Object(p.jsx)(O.a, {
                                            id: "showAd",
                                            name: "showAd",
                                            control: S,
                                            render: function (e) {
                                                var t = e.field;
                                                return Object(p.jsx)(
                                                h.v,
                                                Object(d.a)(
                                                    Object(d.a)({}, t),
                                                    {},
                                                    {
                                                    type: "switch",
                                                    name: "showAd",
                                                    invalid: J.showAd && !0,
                                                    checked: U,
                                                    onChange: function (e) {
                                                        var n;
                                                        G(
                                                        !(
                                                            null === e ||
                                                            void 0 === e ||
                                                            null ===
                                                            (n = e.target) ||
                                                            void 0 === n ||
                                                            !n.checked
                                                        )
                                                        ),
                                                        t.onChange(e);
                                                    },
                                                    }
                                                )
                                                );
                                            },
                                            }),
                                            J.showAd &&
                                            Object(p.jsx)(h.u, {
                                                children: J.showAd.message,
                                            }),
                                            Object(p.jsx)(h.y, {
                                            className: "form-check-label",
                                            for: "showAd",
                                            children: "Show Ad",
                                            }),
                                        ],
                                        }),
                                    }),
                                    }),
                                ],
                                }),
                            ],
                            }),
                        a
                            ? Object(p.jsxs)(h.f, {
                                variant: "primary",
                                disabled: !0,
                                children: [
                                Object(p.jsx)(h.K, {
                                    as: "span",
                                    animation: "grow",
                                    size: "sm",
                                    role: "status",
                                    "aria-hidden": "true",
                                }),
                                "Loading...",
                                ],
                            })
                            : Object(p.jsx)(h.f, {
                                type: "submit",
                                color: "primary",
                                className: "me-1",
                                form: "formType",
                                children: "Submit",
                            }),
                        ],
                    }),
                    ],
                }),
                });
            });
        t.default = function () {
            var e,
            t = Object(l.b)(),
            n = Object(l.c)(function (e) {
                return e.auth;
            }),
            d = Object(j.l)(),
            u = r.a.create();
            return (
            u.interceptors.request.use(
                (function () {
                var e = Object(a.a)(
                    Object(c.a)().mark(function e(a) {
                    var s, l, j;
                    return Object(c.a)().wrap(
                        function (e) {
                        for (;;)
                            switch ((e.prev = e.next)) {
                            case 0:
                                if (
                                ((e.prev = 0),
                                !(
                                    1e3 *
                                    (null === n ||
                                    void 0 === n ||
                                    null === (s = n.user) ||
                                    void 0 === s
                                        ? void 0
                                        : s.exp) <
                                    Date.now() || "" === n.accessToken
                                ) && n.accessToken)
                                ) {
                                e.next = 11;
                                break;
                                }
                                return (e.next = 4), r.a.get(o.b.token);
                            case 4:
                                (l = e.sent),
                                (a.headers.Authorization = "Bearer ".concat(
                                    l.data.accessToken
                                )),
                                (j = Object(i.a)(l.data.accessToken)),
                                t(Object(b.b)(l.data.accessToken)),
                                t(Object(b.c)(j)),
                                (e.next = 12);
                                break;
                            case 11:
                                a.headers.Authorization = "Bearer ".concat(
                                n.accessToken
                                );
                            case 12:
                                e.next = 16;
                                break;
                            case 14:
                                (e.prev = 14), (e.t0 = e.catch(0));
                            case 16:
                                return (e.prev = 16), e.abrupt("return", a);
                            case 19:
                            case "end":
                                return e.stop();
                            }
                        },
                        e,
                        null,
                        [[0, 14, 16, 19]]
                    );
                    })
                );
                return function (t) {
                    return e.apply(this, arguments);
                };
                })(),
                function (e) {
                return Promise.reject(e);
                }
            ),
            Object(s.useEffect)(function () {
                var e;
                ("" === n.accessToken ||
                !n.accessToken ||
                1e3 * (null === (e = n.user) || void 0 === e ? void 0 : e.exp) <
                    Date.now()) &&
                r.a
                    .get(o.b.token)
                    .then(function (e) {
                    var n = e.data,
                        c = Object(i.a)(n.accessToken);
                    t(Object(b.b)(n.accessToken)), t(Object(b.c)(c));
                    })
                    .catch(function (e) {
                    console.log(e), d("/auth/login");
                    });
            }, []),
            Object(p.jsxs)("div", {
                children: [
                Object(p.jsx)(M, { axiosJwt: u }),
                "Basic" !==
                    (null === (e = n.user) || void 0 === e ? void 0 : e.role) &&
                    Object(p.jsx)(V, { axiosJwt: u }),
                ],
            })
            );
        };
        },
    },
    ]);
    //# sourceMappingURL=35.3db4151c.chunk.js.map
