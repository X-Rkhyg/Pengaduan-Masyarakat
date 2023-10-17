    (this["webpackJsonpvuexy-react-admin-dashboard"] =
    this["webpackJsonpvuexy-react-admin-dashboard"] || []).push([
    [34],
    {
        408: function (e, t, r) {
        "use strict";
        r.r(t);
        var a = r(19),
            n = r(6),
            c = r(11),
            s = r(7),
            i = r(1),
            o = r(124),
            u = r(121),
            l = r(51),
            d = r(125),
            b = r(126),
            j = r(43),
            m = r(49),
            O = r(5),
            h = r(50),
            p = r.n(h),
            f = r(123),
            v = r(52),
            x = r(10);
        t.default = function () {
            var e = Object(m.b)(),
            t = Object(m.c)(function (e) {
                return e.auth;
            }),
            r = Object(O.l)(),
            h = Object(i.useState)(!1),
            g = Object(s.a)(h, 2),
            y = g[0],
            q = g[1],
            k = Object(i.useState)({}),
            T = Object(s.a)(k, 2),
            w = T[0],
            F = T[1],
            A = d
                .e()
                .shape({
                wait: d.g().required(),
                error: d.g().required(),
                invLink: d.g().required(),
                OnlyGrup: d.g().required(),
                OnlyPM: d.g().required(),
                GrupAdmin: d.g().required(),
                BotAdmin: d.g().required(),
                OnlyOwner: d.g().required(),
                OnlyPrem: d.g().required(),
                limit: d.g().required(),
                call: d.g().required(),
                antidelete: d.g().required(),
                antiluar: d.g().required(),
                promoteText: d.g().required(),
                demoteText: d.g().required(),
                welcomeText: d.g().required(),
                leftText: d.g().required(),
                ytmp3: d.g().required(),
                ytmp4: d.g().required(),
                level: d.g().required(),
                play: d.g().required(),
                }),
            S = Object(o.f)({
                mode: "onChange",
                resolver: Object(b.a)(A),
                defaultValues: {
                wait: "",
                error: "",
                invLink: "",
                OnlyGrup: "",
                OnlyPM: "",
                GrupAdmin: "",
                BotAdmin: "",
                OnlyOwner: "",
                OnlyPrem: "",
                limit: "",
                call: "",
                antidelete: "",
                antiluar: "",
                promoteText: "",
                demoteText: "",
                welcomeText: "",
                leftText: "",
                ytmp3: "",
                ytmp4: "",
                level: "",
                play: "",
                },
            }),
            N = S.control,
            P = S.formState.errors,
            B = S.handleSubmit,
            G = S.setValue,
            z = u.a.create();
            z.interceptors.request.use(
            (function () {
                var r = Object(c.a)(
                Object(n.a)().mark(function r(a) {
                    var c, s, i;
                    return Object(n.a)().wrap(
                    function (r) {
                        for (;;)
                        switch ((r.prev = r.next)) {
                            case 0:
                            if (
                                ((r.prev = 0),
                                !(
                                1e3 *
                                    (null === t ||
                                    void 0 === t ||
                                    null === (c = t.user) ||
                                    void 0 === c
                                    ? void 0
                                    : c.exp) <
                                    Date.now() || "" === t.accessToken
                                ) && t.accessToken)
                            ) {
                                r.next = 11;
                                break;
                            }
                            return (r.next = 4), u.a.get(f.b.token);
                            case 4:
                            (s = r.sent),
                                (a.headers.Authorization = "Bearer ".concat(
                                s.data.accessToken
                                )),
                                (i = Object(l.a)(s.data.accessToken)),
                                e(Object(v.b)(s.data.accessToken)),
                                e(Object(v.c)(i)),
                                (r.next = 12);
                            break;
                            case 11:
                            a.headers.Authorization = "Bearer ".concat(
                                t.accessToken
                            );
                            case 12:
                            r.next = 16;
                            break;
                            case 14:
                            (r.prev = 14), (r.t0 = r.catch(0));
                            case 16:
                            return (r.prev = 16), r.abrupt("return", a);
                            case 19:
                            case "end":
                            return r.stop();
                        }
                    },
                    r,
                    null,
                    [[0, 14, 16, 19]]
                    );
                })
                );
                return function (e) {
                return r.apply(this, arguments);
                };
            })(),
            function (e) {
                return Promise.reject(e);
            }
            );
            var L = function () {
            z.get("".concat(f.a, "/user/mess"))
                .then(function (e) {
                var t = e.data.result;
                for (var r in (F(t), t)) "botId" !== r && G(r, t[r]);
                })
                .catch(function () {});
            };
            Object(i.useEffect)(function () {
            var a;
            "" === t.accessToken ||
            !t.accessToken ||
            1e3 * (null === (a = t.user) || void 0 === a ? void 0 : a.exp) <
                Date.now()
                ? u.a
                    .get(f.b.token)
                    .then(function (t) {
                    var r = t.data,
                        a = Object(l.a)(r.accessToken);
                    e(Object(v.b)(r.accessToken)), e(Object(v.c)(a)), L();
                    })
                    .catch(function (e) {
                    console.log(e), r("/auth/login");
                    })
                : L();
            }, []);
            return Object(x.jsx)(j.h, {
            children: Object(x.jsxs)(j.i, {
                children: [
                Object(x.jsx)(j.n, {
                    tag: "h4",
                    className: "mb-1",
                    children: "Mess",
                }),
                Object(x.jsxs)(j.t, {
                    onSubmit: B(function (e) {
                    q(!0),
                        z
                        .post("".concat(f.a, "/user/mess"), e)
                        .then(function (e) {
                            q(!1), p.a.success(e.data.message);
                        })
                        .catch(function (e) {
                            var t, r;
                            q(!1),
                            p.a.error(
                                null === e ||
                                void 0 === e ||
                                null === (t = e.response) ||
                                void 0 === t ||
                                null === (r = t.data) ||
                                void 0 === r
                                ? void 0
                                : r.message
                            );
                        });
                    }),
                    children: [
                    Object.keys(w).map(function (e, t) {
                        return Object(x.jsxs)(
                        "div",
                        {
                            className: "mb-1",
                            children: [
                            Object(x.jsxs)(j.y, {
                                className: "form-label",
                                for: e,
                                children: [
                                e,
                                Object(x.jsx)("font", {
                                    color: "FF7F7F",
                                    children: "*",
                                }),
                                ],
                            }),
                            Object(x.jsx)(o.a, {
                                id: e,
                                name: e,
                                control: N,
                                render: function (t) {
                                var r = t.field;
                                return Object(x.jsx)(
                                    j.v,
                                    Object(a.a)(
                                    Object(a.a)({}, r),
                                    {},
                                    {
                                        invalid: P["".concat(e)] && !0,
                                        type: "textarea",
                                        style: { height: "130px" },
                                    }
                                    )
                                );
                                },
                            }),
                            P["".concat(e)] &&
                                Object(x.jsx)(j.u, {
                                children: P["".concat(e)].message,
                                }),
                            ],
                        },
                        t + 1
                        );
                    }),
                    y
                        ? Object(x.jsxs)(j.f, {
                            variant: "primary",
                            disabled: !0,
                            children: [
                            Object(x.jsx)(j.K, {
                                as: "span",
                                animation: "grow",
                                size: "sm",
                                role: "status",
                                "aria-hidden": "true",
                            }),
                            " ",
                            "Loading...",
                            ],
                        })
                        : Object(x.jsx)(j.f, {
                            type: "submit",
                            color: "primary",
                            className: "me-1",
                            children: "Submit",
                        }),
                    Object(x.jsx)("div", {
                        className: "text-end",
                        children: Object(x.jsxs)("small", {
                        children: [
                            Object(x.jsx)("font", {
                            color: "FF7F7F",
                            children: "*",
                            }),
                            " required fields",
                        ],
                        }),
                    }),
                    ],
                }),
                ],
            }),
            });
        };
        },
    },
    ]);
    //# sourceMappingURL=34.0aa74115.chunk.js.map
