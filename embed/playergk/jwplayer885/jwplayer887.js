/*!
   JW Player version 8.8.5
   Copyright (c) 2019, JW Player, All Rights Reserved 
   This source code and its use and distribution is subject to the terms 
   and conditions of the applicable license agreement. 
   https://www.jwplayer.com/tos/
   This product includes portions of other software. For the full text of licenses, see
   https://ssl.p.jwpcdn.com/player/v/8.8.5/notice.txt
*/
window.jwplayer = function(t) {
    function e(e) {
        for (var n, i, o = e[0], u = e[1], a = 0, s = []; a < o.length; a++) i = o[a], r[i] && s.push(r[i][0]), r[i] = 0;
        for (n in u) Object.prototype.hasOwnProperty.call(u, n) && (t[n] = u[n]);
        for (c && c(e); s.length;) s.shift()()
    }
    var n = {},
        r = {
            0: 0
        };

    function i(e) {
        if (n[e]) return n[e].exports;
        var r = n[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return t[e].call(r.exports, r, r.exports, i), r.l = !0, r.exports
    }
    i.e = function(t) {
        var e = [],
            n = r[t];
        if (0 !== n)
            if (n) e.push(n[2]);
            else {
                var o = new Promise(function(e, i) {
                    n = r[t] = [e, i]
                });
                e.push(n[2] = o);
                var u, a = document.createElement("script");
                a.charset = "utf-8", a.timeout = 55, i.nc && a.setAttribute("nonce", i.nc), a.src = function(t) {
                    return i.p + "" + ({
                        1: "jwplayer.controls",
                        2: "jwplayer.core",
                        3: "jwplayer.core.controls",
                        4: "jwplayer.core.controls.html5",
                        5: "jwplayer.core.controls.polyfills",
                        6: "jwplayer.core.controls.polyfills.html5",
                        7: "jwplayer.vr",
                        8: "polyfills.intersection-observer",
                        9: "polyfills.webvtt",
                        10: "provider.airplay",
                        11: "provider.cast",
                        12: "provider.flash",
                        13: "provider.hlsjs",
                        14: "provider.html5",
                        15: "provider.shaka",
                        16: "related",
                        17: "vttparser"
                    }[t] || t) + ".js"
                }(t), u = function(e) {
                    a.onerror = a.onload = null, clearTimeout(c);
                    var n = r[t];
                    if (0 !== n) {
                        if (n) {
                            var i = e && ("load" === e.type ? "missing" : e.type),
                                o = e && e.target && e.target.src,
                                u = new Error("Loading chunk " + t + " failed.\n(" + i + ": " + o + ")");
                            u.type = i, u.request = o, n[1](u)
                        }
                        r[t] = void 0
                    }
                };
                var c = setTimeout(function() {
                    u({
                        type: "timeout",
                        target: a
                    })
                }, 55e3);
                a.onerror = a.onload = u, document.head.appendChild(a)
            }
        return Promise.all(e)
    }, i.m = t, i.c = n, i.d = function(t, e, n) {
        i.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: n
        })
    }, i.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, i.t = function(t, e) {
        if (1 & e && (t = i(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var n = Object.create(null);
        if (i.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var r in t) i.d(n, r, function(e) {
                return t[e]
            }.bind(null, r));
        return n
    }, i.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return i.d(e, "a", e), e
    }, i.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, i.p = "", i.oe = function(t) {
        throw console.error(t), t
    };
    var o = window.webpackJsonpjwplayer = window.webpackJsonpjwplayer || [],
        u = o.push.bind(o);
    o.push = e, o = o.slice();
    for (var a = 0; a < o.length; a++) e(o[a]);
    var c = u;
    return i(i.s = 60)
}([function(t, e, n) {
    "use strict";
    n.d(e, "i", function() {
        return k
    }), n.d(e, "A", function() {
        return P
    }), n.d(e, "F", function() {
        return S
    }), n.d(e, "l", function() {
        return _
    }), n.d(e, "k", function() {
        return F
    }), n.d(e, "a", function() {
        return M
    }), n.d(e, "b", function() {
        return L
    }), n.d(e, "G", function() {
        return D
    }), n.d(e, "n", function() {
        return V
    }), n.d(e, "H", function() {
        return X
    }), n.d(e, "e", function() {
        return W
    }), n.d(e, "J", function() {
        return H
    }), n.d(e, "m", function() {
        return Y
    }), n.d(e, "h", function() {
        return J
    }), n.d(e, "p", function() {
        return K
    }), n.d(e, "c", function() {
        return G
    }), n.d(e, "C", function() {
        return et
    }), n.d(e, "I", function() {
        return it
    }), n.d(e, "q", function() {
        return at
    }), n.d(e, "g", function() {
        return ct
    }), n.d(e, "j", function() {
        return st
    }), n.d(e, "D", function() {
        return lt
    }), n.d(e, "w", function() {
        return dt
    }), n.d(e, "t", function() {
        return gt
    }), n.d(e, "v", function() {
        return bt
    }), n.d(e, "x", function() {
        return mt
    }), n.d(e, "s", function() {
        return yt
    }), n.d(e, "u", function() {
        return jt
    }), n.d(e, "r", function() {
        return wt
    }), n.d(e, "y", function() {
        return Ot
    }), n.d(e, "o", function() {
        return Ct
    }), n.d(e, "d", function() {
        return Pt
    }), n.d(e, "E", function() {
        return xt
    }), n.d(e, "B", function() {
        return St
    }), n.d(e, "z", function() {
        return Et
    });
    var r = n(17),
        i = {},
        o = Array.prototype,
        u = Object.prototype,
        a = Function.prototype,
        c = o.slice,
        s = o.concat,
        l = u.toString,
        f = u.hasOwnProperty,
        d = o.map,
        p = o.reduce,
        h = o.forEach,
        v = o.filter,
        g = o.every,
        b = o.some,
        m = o.indexOf,
        y = Array.isArray,
        j = Object.keys,
        w = a.bind,
        O = window.isFinite,
        k = function(t, e, n) {
            var r, o;
            if (null == t) return t;
            if (h && t.forEach === h) t.forEach(e, n);
            else if (t.length === +t.length) {
                for (r = 0, o = t.length; r < o; r++)
                    if (e.call(n, t[r], r, t) === i) return
            } else {
                var u = ot(t);
                for (r = 0, o = u.length; r < o; r++)
                    if (e.call(n, t[u[r]], u[r], t) === i) return
            }
            return t
        },
        C = k,
        P = function(t, e, n) {
            var r = [];
            return null == t ? r : d && t.map === d ? t.map(e, n) : (k(t, function(t, i, o) {
                r.push(e.call(n, t, i, o))
            }), r)
        },
        x = P,
        S = function(t, e, n, r) {
            var i = arguments.length > 2;
            if (null == t && (t = []), p && t.reduce === p) return r && (e = G(e, r)), i ? t.reduce(e, n) : t.reduce(e);
            if (k(t, function(t, o, u) {
                    i ? n = e.call(r, n, t, o, u) : (n = t, i = !0)
                }), !i) throw new TypeError("Reduce of empty array with no initial value");
            return n
        },
        T = S,
        E = S,
        _ = function(t, e, n) {
            var r;
            return L(t, function(t, i, o) {
                if (e.call(n, t, i, o)) return r = t, !0
            }), r
        },
        A = _,
        F = function(t, e, n) {
            var r = [];
            return null == t ? r : v && t.filter === v ? t.filter(e, n) : (k(t, function(t, i, o) {
                e.call(n, t, i, o) && r.push(t)
            }), r)
        },
        N = F,
        M = function(t, e, n) {
            e || (e = Ct);
            var r = !0;
            return null == t ? r : g && t.every === g ? t.every(e, n) : (k(t, function(t, o, u) {
                if (!(r = r && e.call(n, t, o, u))) return i
            }), !!r)
        },
        I = M,
        L = function(t, e, n) {
            e || (e = Ct);
            var r = !1;
            return null == t ? r : b && t.some === b ? t.some(e, n) : (k(t, function(t, o, u) {
                if (r || (r = e.call(n, t, o, u))) return i
            }), !!r)
        },
        R = L,
        D = function(t) {
            return null == t ? 0 : t.length === +t.length ? t.length : ot(t).length
        },
        B = function(t, e) {
            var n;
            return function() {
                return --t > 0 && (n = e.apply(this, arguments)), t <= 1 && (e = null), n
            }
        },
        z = function(t) {
            return null == t ? Ct : gt(t) ? t : xt(t)
        },
        q = function(t) {
            return function(e, n, r) {
                var i = {};
                return n = z(n), k(e, function(o, u) {
                    var a = n.call(r, o, u, e);
                    t(i, a, o)
                }), i
            }
        },
        V = q(function(t, e, n) {
            kt(t, e) ? t[e].push(n) : t[e] = [n]
        }),
        Q = q(function(t, e, n) {
            t[e] = n
        }),
        X = function(t, e, n, r) {
            for (var i = (n = z(n)).call(r, e), o = 0, u = t.length; o < u;) {
                var a = o + u >>> 1;
                n.call(r, t[a]) < i ? o = a + 1 : u = a
            }
            return o
        },
        W = function(t, e) {
            return null != t && (t.length !== +t.length && (t = ut(t)), K(t, e) >= 0)
        },
        U = W,
        H = function(t, e) {
            return F(t, St(e))
        },
        Y = function(t, e) {
            return _(t, St(e))
        },
        J = function(t) {
            var e = s.apply(o, c.call(arguments, 1));
            return F(t, function(t) {
                return !W(e, t)
            })
        },
        K = function(t, e, n) {
            if (null == t) return -1;
            var r = 0,
                i = t.length;
            if (n) {
                if ("number" != typeof n) return t[r = X(t, e)] === e ? r : -1;
                r = n < 0 ? Math.max(0, i + n) : n
            }
            if (m && t.indexOf === m) return t.indexOf(e, n);
            for (; r < i; r++)
                if (t[r] === e) return r;
            return -1
        },
        $ = function() {},
        G = function(t, e) {
            var n, r;
            if (w && t.bind === w) return w.apply(t, c.call(arguments, 1));
            if (!gt(t)) throw new TypeError;
            return n = c.call(arguments, 2), r = function() {
                if (!(this instanceof r)) return t.apply(e, n.concat(c.call(arguments)));
                $.prototype = t.prototype;
                var i = new $;
                $.prototype = null;
                var o = t.apply(i, n.concat(c.call(arguments)));
                return Object(o) === o ? o : i
            }
        },
        Z = function(t) {
            var e = c.call(arguments, 1);
            return function() {
                for (var n = 0, r = e.slice(), i = 0, o = r.length; i < o; i++) kt(r[i], "partial") && (r[i] = arguments[n++]);
                for (; n < arguments.length;) r.push(arguments[n++]);
                return t.apply(this, r)
            }
        },
        tt = Z(B, 2),
        et = function(t, e) {
            var n = {};
            return e || (e = Ct),
                function() {
                    var r = e.apply(this, arguments);
                    return kt(n, r) ? n[r] : n[r] = t.apply(this, arguments)
                }
        },
        nt = function(t, e) {
            var n = c.call(arguments, 2);
            return setTimeout(function() {
                return t.apply(null, n)
            }, e)
        },
        rt = Z(nt, {
            partial: Z
        }, 1),
        it = function(t, e, n) {
            var r, i, o, u = null,
                a = 0;
            n || (n = {});
            var c = function() {
                a = !1 === n.leading ? 0 : Tt(), u = null, o = t.apply(r, i), r = i = null
            };
            return function() {
                a || !1 !== n.leading || (a = Tt);
                var s = e - (Tt - a);
                return r = this, i = arguments, s <= 0 ? (clearTimeout(u), u = null, a = Tt, o = t.apply(r, i), r = i = null) : u || !1 === n.trailing || (u = setTimeout(c, s)), o
            }
        },
        ot = function(t) {
            if (!dt(t)) return [];
            if (j) return j(t);
            var e = [];
            for (var n in t) kt(t, n) && e.push(n);
            return e
        },
        ut = function(t) {
            for (var e = ot(t), n = ot.length, r = Array(n), i = 0; i < n; i++) r[i] = t[e[i]];
            return r
        },
        at = function(t) {
            for (var e = {}, n = ot(t), r = 0, i = n.length; r < i; r++) e[t[n[r]]] = n[r];
            return e
        },
        ct = function(t) {
            return k(c.call(arguments, 1), function(e) {
                if (e)
                    for (var n in e) void 0 === t[n] && (t[n] = e[n])
            }), t
        },
        st = Object.assign || function(t) {
            return k(c.call(arguments, 1), function(e) {
                if (e)
                    for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n])
            }), t
        },
        lt = function(t) {
            var e = {},
                n = s.apply(o, c.call(arguments, 1));
            return k(n, function(n) {
                n in t && (e[n] = t[n])
            }), e
        },
        ft = y || function(t) {
            return "[object Array]" == l.call(t)
        },
        dt = function(t) {
            return t === Object(t)
        },
        pt = [];
    k(["Function", "String", "Number", "Date", "RegExp"], function(t) {
        pt[t] = function(e) {
            return l.call(e) == "[object " + t + "]"
        }
    }), pt.Function = function(t) {
        return "function" == typeof t
    };
    var ht = pt.Date,
        vt = pt.RegExp,
        gt = pt.Function,
        bt = pt.Number,
        mt = pt.String,
        yt = function(t) {
            return O(t) && !jt(parseFloat(t))
        },
        jt = function(t) {
            return bt(t) && t != +t
        },
        wt = function(t) {
            return !0 === t || !1 === t || "[object Boolean]" == l.call(t)
        },
        Ot = function(t) {
            return void 0 === t
        },
        kt = function(t, e) {
            return f.call(t, e)
        },
        Ct = function(t) {
            return t
        },
        Pt = function(t) {
            return function() {
                return t
            }
        },
        xt = function(t) {
            return function(e) {
                return e[t]
            }
        },
        St = function(t) {
            return function(e) {
                if (e === t) return !0;
                for (var n in t)
                    if (t[n] !== e[n]) return !1;
                return !0
            }
        },
        Tt = r.a,
        Et = function(t) {
            return bt(t) && !jt(t)
        };
    e.f = {
        after: function(t, e) {
            return function() {
                if (--t < 1) return e.apply(this, arguments)
            }
        },
        all: M,
        any: L,
        before: B,
        bind: G,
        clone: function(t) {
            return dt(t) ? ft(t) ? t.slice() : st({}, t) : t
        },
        collect: x,
        compact: function(t) {
            return F(t, Ct)
        },
        constant: Pt,
        contains: W,
        defaults: ct,
        defer: rt,
        delay: nt,
        detect: A,
        difference: J,
        each: k,
        every: I,
        extend: st,
        filter: F,
        find: _,
        findWhere: Y,
        foldl: T,
        forEach: C,
        groupBy: V,
        has: kt,
        identity: Ct,
        include: U,
        indexBy: Q,
        indexOf: K,
        inject: E,
        invert: at,
        isArray: ft,
        isBoolean: wt,
        isDate: ht,
        isFinite: yt,
        isFunction: gt,
        isNaN: jt,
        isNull: function(t) {
            return null === t
        },
        isNumber: bt,
        isObject: dt,
        isRegExp: vt,
        isString: mt,
        isUndefined: Ot,
        isValidNumber: Et,
        keys: ot,
        last: function(t, e, n) {
            if (null != t) return null == e || n ? t[t.length - 1] : c.call(t, Math.max(t.length - e, 0))
        },
        map: P,
        matches: St,
        max: function(t, e, n) {
            if (!e && ft(t) && t[0] === +t[0] && t.length < 65535) return Math.max.apply(Math, t);
            var r = -1 / 0,
                i = -1 / 0;
            return k(t, function(t, o, u) {
                var a = e ? e.call(n, t, o, u) : t;
                a > i && (r = t, i = a)
            }), r
        },
        memoize: et,
        now: Tt,
        omit: function(t) {
            var e = {},
                n = s.apply(o, c.call(arguments, 1));
            for (var r in t) W(n, r) || (e[r] = t[r]);
            return e
        },
        once: tt,
        partial: Z,
        pick: lt,
        pluck: function(t, e) {
            return P(t, xt(e))
        },
        property: xt,
        propertyOf: function(t) {
            return null == t ? function() {} : function(e) {
                return t[e]
            }
        },
        reduce: S,
        reject: function(t, e, n) {
            return F(t, function(t, r, i) {
                return !e.call(n, t, r, i)
            }, n)
        },
        result: function(t, e) {
            if (null != t) {
                var n = t[e];
                return gt(n) ? n.call(t) : n
            }
        },
        select: N,
        size: D,
        some: R,
        sortedIndex: X,
        throttle: it,
        where: H,
        without: function(t) {
            return J(t, c.call(arguments, 1))
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "y", function() {
        return o
    }), n.d(e, "x", function() {
        return u
    }), n.d(e, "w", function() {
        return a
    }), n.d(e, "t", function() {
        return c
    }), n.d(e, "u", function() {
        return s
    }), n.d(e, "a", function() {
        return l
    }), n.d(e, "c", function() {
        return f
    }), n.d(e, "v", function() {
        return d
    }), n.d(e, "d", function() {
        return p
    }), n.d(e, "h", function() {
        return h
    }), n.d(e, "e", function() {
        return v
    }), n.d(e, "k", function() {
        return g
    }), n.d(e, "i", function() {
        return b
    }), n.d(e, "j", function() {
        return m
    }), n.d(e, "b", function() {
        return P
    }), n.d(e, "f", function() {
        return x
    }), n.d(e, "g", function() {
        return S
    }), n.d(e, "o", function() {
        return T
    }), n.d(e, "l", function() {
        return E
    }), n.d(e, "m", function() {
        return _
    }), n.d(e, "n", function() {
        return A
    }), n.d(e, "p", function() {
        return F
    }), n.d(e, "q", function() {
        return N
    }), n.d(e, "r", function() {
        return M
    }), n.d(e, "s", function() {
        return I
    }), n.d(e, "A", function() {
        return L
    }), n.d(e, "z", function() {
        return R
    }), n.d(e, "B", function() {
        return D
    });
    var r = n(0);

    function i(t, e) {
        for (var n = 0; n < e.length; n++) {
            var r = e[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r)
        }
    }
    var o = 1e5,
        u = 100001,
        a = 100002,
        c = 101e3,
        s = 102e3,
        l = 200001,
        f = 202e3,
        d = 104e3,
        p = 203e3,
        h = 203640,
        v = 204e3,
        g = 210001,
        b = 21e4,
        m = 214e3,
        y = 303200,
        j = 303210,
        w = 303212,
        O = 303213,
        k = 303220,
        C = 303230,
        P = 306e3,
        x = 308e3,
        S = 308640,
        T = "cantPlayVideo",
        E = "badConnection",
        _ = "cantLoadPlayer",
        A = "cantPlayInBrowser",
        F = "liveStreamDown",
        N = "protectedContent",
        M = "technicalError",
        I = function() {
            function t(e, n) {
                var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
                ! function(t, e) {
                    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                }(this, t), this.code = Object(r.z)(n) ? n : 0, this.sourceError = i, e && (this.key = e)
            }
            var e, n, o;
            return e = t, o = [{
                key: "logMessage",
                value: function(t) {
                    var e = t % 1e3,
                        n = Math.floor((t - e) / 1e3),
                        r = t;
                    return e >= 400 && e < 600 && (r = "".concat(n, "400-").concat(n, "599")), "JW Player ".concat(t > 299999 && t < 4e5 ? "Warning" : "Error", " ").concat(t, ". For more information see https://developer.jwplayer.com/jw-player/docs/developer-guide/api/errors-reference#").concat(r)
                }
            }], (n = null) && i(e.prototype, n), o && i(e, o), t
        }();

    function L(t, e, n) {
        return n instanceof I && n.code ? n : new I(t, e, n)
    }

    function R(t, e) {
        var n = L(M, e, t);
        return n.code = (t && t.code || 0) + e, n
    }

    function D(t) {
        var e = t.name,
            n = t.message;
        switch (e) {
            case "AbortError":
                return /pause/.test(n) ? O : /load/.test(n) ? w : j;
            case "NotAllowedError":
                return k;
            case "NotSupportedError":
                return C;
            default:
                return y
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "h", function() {
        return o
    }), n.d(e, "d", function() {
        return u
    }), n.d(e, "i", function() {
        return a
    }), n.d(e, "a", function() {
        return c
    }), n.d(e, "b", function() {
        return s
    }), n.d(e, "f", function() {
        return l
    }), n.d(e, "c", function() {
        return f
    }), n.d(e, "e", function() {
        return d
    }), n.d(e, "g", function() {
        return p
    });
    var r = n(0),
        i = window.parseFloat;

    function o(t) {
        return t.replace(/^\s+|\s+$/g, "")
    }

    function u(t, e, n) {
        for (t = "" + t, n = n || "0"; t.length < e;) t = n + t;
        return t
    }

    function a(t, e) {
        for (var n = t.attributes, r = 0; r < n.length; r++)
            if (n[r].name && n[r].name.toLowerCase() === e.toLowerCase()) return n[r].value.toString();
        return ""
    }

    function c(t) {
        if (!t || "rtmp" === t.substr(0, 4)) return "";
        var e = /[(,]format=(m3u8|mpd)-/i.exec(t);
        return e ? e[1] : (t = t.split("?")[0].split("#")[0]).lastIndexOf(".") > -1 ? t.substr(t.lastIndexOf(".") + 1, t.length).toLowerCase() : void 0
    }

    function s(t) {
        var e = (t / 60 | 0) % 60,
            n = t % 60;
        return u(t / 3600 | 0, 2) + ":" + u(e, 2) + ":" + u(n.toFixed(3), 6)
    }

    function l(t, e) {
        if (!t) return 0;
        if (Object(r.z)(t)) return t;
        var n = t.replace(",", "."),
            o = n.slice(-1),
            u = n.split(":"),
            a = u.length,
            c = 0;
        if ("s" === o) c = i(n);
        else if ("m" === o) c = 60 * i(n);
        else if ("h" === o) c = 3600 * i(n);
        else if (a > 1) {
            var s = a - 1;
            4 === a && (e && (c = i(u[s]) / e), s -= 1), c += i(u[s]), c += 60 * i(u[s - 1]), a >= 3 && (c += 3600 * i(u[s - 2]))
        } else c = i(n);
        return Object(r.z)(c) ? c : 0
    }

    function f(t, e, n) {
        if (Object(r.x)(t) && "%" === t.slice(-1)) {
            var o = i(t);
            return e && Object(r.z)(e) && Object(r.z)(o) ? e * o / 100 : null
        }
        return l(t, n)
    }

    function d(t, e) {
        return t.map(function(t) {
            return e + t
        })
    }

    function p(t, e) {
        return t.map(function(t) {
            return t + e
        })
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "kb", function() {
        return r
    }), n.d(e, "nb", function() {
        return i
    }), n.d(e, "lb", function() {
        return o
    }), n.d(e, "pb", function() {
        return u
    }), n.d(e, "qb", function() {
        return a
    }), n.d(e, "mb", function() {
        return c
    }), n.d(e, "ob", function() {
        return s
    }), n.d(e, "rb", function() {
        return l
    }), n.d(e, "s", function() {
        return f
    }), n.d(e, "u", function() {
        return d
    }), n.d(e, "t", function() {
        return p
    }), n.d(e, "n", function() {
        return h
    }), n.d(e, "q", function() {
        return v
    }), n.d(e, "sb", function() {
        return g
    }), n.d(e, "r", function() {
        return b
    }), n.d(e, "Z", function() {
        return m
    }), n.d(e, "W", function() {
        return y
    }), n.d(e, "v", function() {
        return j
    }), n.d(e, "Y", function() {
        return w
    }), n.d(e, "w", function() {
        return O
    }), n.d(e, "ub", function() {
        return k
    }), n.d(e, "a", function() {
        return C
    }), n.d(e, "b", function() {
        return P
    }), n.d(e, "c", function() {
        return x
    }), n.d(e, "d", function() {
        return S
    }), n.d(e, "e", function() {
        return T
    }), n.d(e, "h", function() {
        return E
    }), n.d(e, "F", function() {
        return _
    }), n.d(e, "hb", function() {
        return A
    }), n.d(e, "Q", function() {
        return F
    }), n.d(e, "C", function() {
        return N
    }), n.d(e, "B", function() {
        return M
    }), n.d(e, "E", function() {
        return I
    }), n.d(e, "p", function() {
        return L
    }), n.d(e, "cb", function() {
        return R
    }), n.d(e, "m", function() {
        return D
    }), n.d(e, "G", function() {
        return B
    }), n.d(e, "H", function() {
        return z
    }), n.d(e, "N", function() {
        return q
    }), n.d(e, "O", function() {
        return V
    }), n.d(e, "R", function() {
        return Q
    }), n.d(e, "jb", function() {
        return X
    }), n.d(e, "bb", function() {
        return W
    }), n.d(e, "D", function() {
        return U
    }), n.d(e, "S", function() {
        return H
    }), n.d(e, "P", function() {
        return Y
    }), n.d(e, "T", function() {
        return J
    }), n.d(e, "V", function() {
        return K
    }), n.d(e, "M", function() {
        return $
    }), n.d(e, "L", function() {
        return G
    }), n.d(e, "K", function() {
        return Z
    }), n.d(e, "I", function() {
        return tt
    }), n.d(e, "J", function() {
        return et
    }), n.d(e, "U", function() {
        return nt
    }), n.d(e, "o", function() {
        return rt
    }), n.d(e, "y", function() {
        return it
    }), n.d(e, "ib", function() {
        return ot
    }), n.d(e, "db", function() {
        return ut
    }), n.d(e, "eb", function() {
        return at
    }), n.d(e, "f", function() {
        return ct
    }), n.d(e, "g", function() {
        return st
    }), n.d(e, "ab", function() {
        return lt
    }), n.d(e, "A", function() {
        return ft
    }), n.d(e, "l", function() {
        return dt
    }), n.d(e, "k", function() {
        return pt
    }), n.d(e, "fb", function() {
        return ht
    }), n.d(e, "gb", function() {
        return vt
    }), n.d(e, "tb", function() {
        return gt
    }), n.d(e, "z", function() {
        return bt
    }), n.d(e, "j", function() {
        return mt
    }), n.d(e, "X", function() {
        return yt
    }), n.d(e, "i", function() {
        return jt
    }), n.d(e, "x", function() {
        return wt
    });
    var r = "buffering",
        i = "idle",
        o = "complete",
        u = "paused",
        a = "playing",
        c = "error",
        s = "loading",
        l = "stalled",
        f = "drag",
        d = "dragStart",
        p = "dragEnd",
        h = "click",
        v = "doubleClick",
        g = "tap",
        b = "doubleTap",
        m = "over",
        y = "move",
        j = "enter",
        w = "out",
        O = c,
        k = "warning",
        C = "adClick",
        P = "adPause",
        x = "adPlay",
        S = "adSkipped",
        T = "adTime",
        E = "autostartNotAllowed",
        _ = o,
        A = "ready",
        F = "seek",
        N = "beforePlay",
        M = "beforeComplete",
        I = "bufferFull",
        L = "displayClick",
        R = "playlistComplete",
        D = "cast",
        B = "mediaError",
        z = "firstFrame",
        q = "playAttempt",
        V = "playAttemptFailed",
        Q = "seeked",
        X = "setupError",
        W = "state",
        U = "bufferChange",
        H = "time",
        Y = "ratechange",
        J = "mediaType",
        K = "volume",
        $ = "mute",
        G = "metadataCueParsed",
        Z = "meta",
        tt = "levels",
        et = "levelsChanged",
        nt = "visualQuality",
        rt = "controls",
        it = "fullscreen",
        ot = "resize",
        ut = "playlistItem",
        at = "playlist",
        ct = "audioTracks",
        st = "audioTrackChanged",
        lt = "playbackRateChanged",
        ft = "logoClick",
        dt = "captionsList",
        pt = "captionsChanged",
        ht = "providerChanged",
        vt = "providerFirstFrame",
        gt = "userAction",
        bt = "instreamClick",
        mt = "breakpoint",
        yt = "fullscreenchange",
        jt = "bandwidthEstimate",
        wt = "float"
}, function(t, e, n) {
    "use strict";
    n.d(e, "b", function() {
        return i
    }), n.d(e, "d", function() {
        return o
    }), n.d(e, "a", function() {
        return u
    }), n.d(e, "c", function() {
        return a
    });
    var r = n(2);

    function i(t) {
        var e = "";
        return t && (t.localName ? e = t.localName : t.baseName && (e = t.baseName)), e
    }

    function o(t) {
        var e = "";
        return t && (t.textContent ? e = Object(r.h)(t.textContent) : t.text && (e = Object(r.h)(t.text))), e
    }

    function u(t, e) {
        return t.childNodes[e]
    }

    function a(t) {
        return t.childNodes ? t.childNodes.length : 0
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "h", function() {
        return u
    }), n.d(e, "f", function() {
        return a
    }), n.d(e, "l", function() {
        return s
    }), n.d(e, "k", function() {
        return l
    }), n.d(e, "p", function() {
        return f
    }), n.d(e, "g", function() {
        return d
    }), n.d(e, "e", function() {
        return p
    }), n.d(e, "n", function() {
        return h
    }), n.d(e, "d", function() {
        return v
    }), n.d(e, "i", function() {
        return g
    }), n.d(e, "q", function() {
        return b
    }), n.d(e, "j", function() {
        return m
    }), n.d(e, "c", function() {
        return y
    }), n.d(e, "b", function() {
        return j
    }), n.d(e, "o", function() {
        return w
    }), n.d(e, "m", function() {
        return O
    }), n.d(e, "a", function() {
        return k
    });
    var r = navigator.userAgent;

    function i(t) {
        return null !== r.match(t)
    }

    function o(t) {
        return function() {
            return i(t)
        }
    }

    function u() {
        var t = k();
        return !!(t && t >= 18)
    }
    var a = o(/gecko\//i),
        c = o(/trident\/.+rv:\s*11/i),
        s = o(/iP(hone|od)/i),
        l = o(/iPad/i),
        f = o(/Macintosh/i),
        d = o(/FBAV/i);

    function p() {
        return i(/\sEdge\/\d+/i)
    }

    function h() {
        return i(/msie/i)
    }

    function v() {
        return i(/\s(?:(?:Headless)?Chrome|CriOS)\//i) && !p() && !i(/UCBrowser/i)
    }

    function g() {
        return p() || c() || h()
    }

    function b() {
        return i(/safari/i) && !i(/(?:Chrome|CriOS|chromium|android|phantom)/i)
    }

    function m() {
        return i(/iP(hone|ad|od)/i)
    }

    function y() {
        return !(i(/chrome\/[123456789]/i) && !i(/chrome\/18/i) && !a()) && j()
    }

    function j() {
        return i(/Android/i) && !i(/Windows Phone/i)
    }

    function w() {
        return m() || j() || i(/Windows Phone/i)
    }

    function O() {
        try {
            return window.self !== window.top
        } catch (t) {
            return !0
        }
    }

    function k() {
        if (j()) return 0;
        var t, e = navigator.plugins;
        if (e && (t = e["Shockwave Flash"]) && t.description) return parseFloat(t.description.replace(/\D+(\d+\.?\d*).*/, "$1"));
        if (void 0 !== window.ActiveXObject) {
            try {
                if (t = new window.ActiveXObject("ShockwaveFlash.ShockwaveFlash")) return parseFloat(t.GetVariable("$version").split(" ")[1].replace(/\s*,\s*/, "."))
            } catch (t) {
                return 0
            }
            return t
        }
        return 0
    }
}, function(t, e, n) {
    "use strict";
    n.r(e);
    var r = n(5);

    function i(t, e) {
        if (t && t.length > e) return t[e]
    }
    var o = n(0);
    n.d(e, "Browser", function() {
        return a
    }), n.d(e, "OS", function() {
        return c
    }), n.d(e, "Features", function() {
        return s
    });
    var u = navigator.userAgent;
    var a = {},
        c = {},
        s = {};
    Object.defineProperties(a, {
        androidNative: {
            get: Object(o.C)(r.c),
            enumerable: !0
        },
        chrome: {
            get: Object(o.C)(r.d),
            enumerable: !0
        },
        edge: {
            get: Object(o.C)(r.e),
            enumerable: !0
        },
        facebook: {
            get: Object(o.C)(r.g),
            enumerable: !0
        },
        firefox: {
            get: Object(o.C)(r.f),
            enumerable: !0
        },
        ie: {
            get: Object(o.C)(r.i),
            enumerable: !0
        },
        msie: {
            get: Object(o.C)(r.n),
            enumerable: !0
        },
        safari: {
            get: Object(o.C)(r.q),
            enumerable: !0
        },
        version: {
            get: Object(o.C)(function(t, e) {
                var n, r, i, o;
                return t.chrome ? n = -1 !== e.indexOf("Chrome") ? e.substring(e.indexOf("Chrome") + 7) : e.substring(e.indexOf("CriOS") + 6) : t.safari ? n = e.substring(e.indexOf("Version") + 8) : t.firefox ? n = e.substring(e.indexOf("Firefox") + 8) : t.edge ? n = e.substring(e.indexOf("Edge") + 5) : t.ie && (-1 !== e.indexOf("rv:") ? n = e.substring(e.indexOf("rv:") + 3) : -1 !== e.indexOf("MSIE") && (n = e.substring(e.indexOf("MSIE") + 5))), n && (-1 !== (o = n.indexOf(";")) && (n = n.substring(0, o)), -1 !== (o = n.indexOf(" ")) && (n = n.substring(0, o)), -1 !== (o = n.indexOf(")")) && (n = n.substring(0, o)), r = parseInt(n, 10), i = parseInt(n.split(".")[1], 10)), {
                    version: n,
                    major: r,
                    minor: i
                }
            }.bind(void 0, a, u)),
            enumerable: !0
        }
    }), Object.defineProperties(c, {
        android: {
            get: Object(o.C)(r.b),
            enumerable: !0
        },
        iOS: {
            get: Object(o.C)(r.j),
            enumerable: !0
        },
        mobile: {
            get: Object(o.C)(r.o),
            enumerable: !0
        },
        mac: {
            get: Object(o.C)(r.p),
            enumerable: !0
        },
        iPad: {
            get: Object(o.C)(r.k),
            enumerable: !0
        },
        iPhone: {
            get: Object(o.C)(r.l),
            enumerable: !0
        },
        windows: {
            get: Object(o.C)(function() {
                return u.indexOf("Windows") > -1
            }),
            enumerable: !0
        },
        version: {
            get: Object(o.C)(function(t, e) {
                var n, r, o;
                if (t.windows) switch (n = i(/Windows(?: NT|)? ([._\d]+)/.exec(e), 1)) {
                    case "6.1":
                        n = "7.0";
                        break;
                    case "6.2":
                        n = "8.0";
                        break;
                    case "6.3":
                        n = "8.1"
                } else t.android ? n = i(/Android ([._\d]+)/.exec(e), 1) : t.iOS ? n = i(/OS ([._\d]+)/.exec(e), 1) : t.mac && (n = i(/Mac OS X (10[._\d]+)/.exec(e), 1));
                if (n) {
                    r = parseInt(n, 10);
                    var u = n.split(/[._]/);
                    u && (o = parseInt(u[1], 10))
                }
                return {
                    version: n,
                    major: r,
                    minor: o
                }
            }.bind(void 0, c, u)),
            enumerable: !0
        }
    }), Object.defineProperties(s, {
        flash: {
            get: Object(o.C)(r.h),
            enumerable: !0
        },
        flashVersion: {
            get: Object(o.C)(r.a),
            enumerable: !0
        },
        iframe: {
            get: Object(o.C)(r.m),
            enumerable: !0
        },
        passiveEvents: {
            get: Object(o.C)(function() {
                var t = !1;
                try {
                    var e = Object.defineProperty({}, "passive", {
                        get: function() {
                            return t = !0
                        }
                    });
                    window.addEventListener("testPassive", null, e), window.removeEventListener("testPassive", null, e)
                } catch (t) {}
                return t
            }),
            enumerable: !0
        },
        backgroundLoading: {
            get: Object(o.C)(function() {
                return !(c.iOS || a.safari)
            }),
            enumerable: !0
        }
    })
}, function(t, e, n) {
    "use strict";

    function r(t) {
        return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }
    n.r(e), n.d(e, "exists", function() {
        return o
    }), n.d(e, "isHTTPS", function() {
        return u
    }), n.d(e, "isFileProtocol", function() {
        return a
    }), n.d(e, "isRtmp", function() {
        return c
    }), n.d(e, "isYouTube", function() {
        return s
    }), n.d(e, "typeOf", function() {
        return l
    }), n.d(e, "isDeepKeyCompliant", function() {
        return f
    });
    var i = window.location.protocol;

    function o(t) {
        switch (r(t)) {
            case "string":
                return t.length > 0;
            case "object":
                return null !== t;
            case "undefined":
                return !1;
            default:
                return !0
        }
    }

    function u() {
        return "https:" === i
    }

    function a() {
        return "file:" === i
    }

    function c(t, e) {
        return 0 === t.indexOf("rtmp:") || "rtmp" === e
    }

    function s(t, e) {
        return "youtube" === e || /^(http|\/\/).*(youtube\.com|youtu\.be)\/.+/.test(t)
    }

    function l(t) {
        if (null === t) return "null";
        var e = r(t);
        return "object" === e && Array.isArray(t) ? "array" : e
    }

    function f(t, e, n) {
        var i = Object.keys(t);
        return Object.keys(e).length >= i.length && i.every(function(i) {
            var o = t[i],
                u = e[i];
            return o && "object" === r(o) ? !(!u || "object" !== r(u)) && f(o, u, n) : n(i, t)
        })
    }
}, function(t, e, n) {
    "use strict";

    function r(t) {
        return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }

    function i(t, e) {
        for (var n = 0; n < e.length; n++) {
            var r = e[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r)
        }
    }
    n.d(e, "a", function() {
        return u
    }), n.d(e, "c", function() {
        return a
    }), n.d(e, "d", function() {
        return c
    }), n.d(e, "b", function() {
        return s
    }), n.d(e, "e", function() {
        return l
    }), n.d(e, "f", function() {
        return f
    });
    var o = [].slice,
        u = function() {
            function t() {
                ! function(t, e) {
                    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                }(this, t)
            }
            var e, n, r;
            return e = t, (n = [{
                key: "on",
                value: function(t, e, n) {
                    if (!p(this, "on", t, [e, n]) || !e) return this;
                    var r = this._events || (this._events = {});
                    return (r[t] || (r[t] = [])).push({
                        callback: e,
                        context: n
                    }), this
                }
            }, {
                key: "once",
                value: function(t, e, n) {
                    if (!p(this, "once", t, [e, n]) || !e) return this;
                    var r = 0,
                        i = this,
                        o = function n() {
                            r++ || (i.off(t, n), e.apply(this, arguments))
                        };
                    return o._callback = e, this.on(t, o, n)
                }
            }, {
                key: "off",
                value: function(t, e, n) {
                    if (!this._events || !p(this, "off", t, [e, n])) return this;
                    if (!t && !e && !n) return delete this._events, this;
                    for (var r = t ? [t] : Object.keys(this._events), i = 0, o = r.length; i < o; i++) {
                        t = r[i];
                        var u = this._events[t];
                        if (u) {
                            var a = this._events[t] = [];
                            if (e || n)
                                for (var c = 0, s = u.length; c < s; c++) {
                                    var l = u[c];
                                    (e && e !== l.callback && e !== l.callback._callback || n && n !== l.context) && a.push(l)
                                }
                            a.length || delete this._events[t]
                        }
                    }
                    return this
                }
            }, {
                key: "trigger",
                value: function(t) {
                    if (!this._events) return this;
                    var e = o.call(arguments, 1);
                    if (!p(this, "trigger", t, e)) return this;
                    var n = this._events[t],
                        r = this._events.all;
                    return n && h(n, e, this), r && h(r, arguments, this), this
                }
            }, {
                key: "triggerSafe",
                value: function(t) {
                    if (!this._events) return this;
                    var e = o.call(arguments, 1);
                    if (!p(this, "trigger", t, e)) return this;
                    var n = this._events[t],
                        r = this._events.all;
                    return n && h(n, e, this, t), r && h(r, arguments, this, t), this
                }
            }]) && i(e.prototype, n), r && i(e, r), t
        }(),
        a = u.prototype.on,
        c = u.prototype.once,
        s = u.prototype.off,
        l = u.prototype.trigger,
        f = u.prototype.triggerSafe;
    u.on = a, u.once = c, u.off = s, u.trigger = l;
    var d = /\s+/;

    function p(t, e, n, i) {
        if (!n) return !0;
        if ("object" === r(n)) {
            for (var o in n) Object.prototype.hasOwnProperty.call(n, o) && t[e].apply(t, [o, n[o]].concat(i));
            return !1
        }
        if (d.test(n)) {
            for (var u = n.split(d), a = 0, c = u.length; a < c; a++) t[e].apply(t, [u[a]].concat(i));
            return !1
        }
        return !0
    }

    function h(t, e, n, r) {
        for (var i = -1, o = t.length; ++i < o;) {
            var u = t[i];
            if (r) try {
                u.callback.apply(u.context || n, e)
            } catch (t) {
                console.log('Error in "' + r + '" event handler:', t)
            } else u.callback.apply(u.context || n, e)
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "h", function() {
        return u
    }), n.d(e, "e", function() {
        return a
    }), n.d(e, "p", function() {
        return c
    }), n.d(e, "i", function() {
        return s
    }), n.d(e, "r", function() {
        return l
    }), n.d(e, "q", function() {
        return f
    }), n.d(e, "t", function() {
        return d
    }), n.d(e, "d", function() {
        return v
    }), n.d(e, "a", function() {
        return g
    }), n.d(e, "n", function() {
        return b
    }), n.d(e, "o", function() {
        return m
    }), n.d(e, "u", function() {
        return y
    }), n.d(e, "s", function() {
        return j
    }), n.d(e, "g", function() {
        return w
    }), n.d(e, "b", function() {
        return O
    }), n.d(e, "f", function() {
        return k
    }), n.d(e, "c", function() {
        return C
    }), n.d(e, "l", function() {
        return P
    }), n.d(e, "j", function() {
        return x
    }), n.d(e, "m", function() {
        return S
    }), n.d(e, "k", function() {
        return T
    });
    var r, i = n(0),
        o = n(2);

    function u(t, e) {
        return t.classList.contains(e)
    }

    function a(t) {
        return s(t).firstChild
    }

    function c(t, e) {
        w(t),
            function(t, e) {
                if (!e) return;
                for (var n = document.createDocumentFragment(), r = s(e).childNodes, i = 0; i < r.length; i++) n.appendChild(r[i].cloneNode());
                t.appendChild(n)
            }(t, e)
    }

    function s(t) {
        r || (r = new DOMParser);
        var e = r.parseFromString(t, "text/html").body;
        l(e);
        for (var n = e.querySelectorAll("img,svg"), i = n.length; i--;) {
            f(n[i])
        }
        return e
    }

    function l(t) {
        for (var e = t.querySelectorAll("script,object,iframe"), n = e.length; n--;) {
            var r = e[n];
            r.parentNode.removeChild(r)
        }
        return t
    }

    function f(t) {
        for (var e = t.attributes, n = e.length; n--;) {
            var r = e[n].name;
            /^on/.test(r) && t.removeAttribute(r)
        }
        return t
    }

    function d(t) {
        return t + (t.toString().indexOf("%") > 0 ? "" : "px")
    }

    function p(t) {
        return Object(i.x)(t.className) ? t.className.split(" ") : []
    }

    function h(t, e) {
        e = Object(o.h)(e), t.className !== e && (t.className = e)
    }

    function v(t) {
        return t.classList ? t.classList : p(t)
    }

    function g(t, e) {
        var n = p(t);
        (Array.isArray(e) ? e : e.split(" ")).forEach(function(t) {
            Object(i.e)(n, t) || n.push(t)
        }), h(t, n.join(" "))
    }

    function b(t, e) {
        var n = p(t),
            r = Array.isArray(e) ? e : e.split(" ");
        h(t, Object(i.h)(n, r).join(" "))
    }

    function m(t, e, n) {
        var r = t.className || "";
        e.test(r) ? r = r.replace(e, n) : n && (r += " " + n), h(t, r)
    }

    function y(t, e, n) {
        var r = u(t, e);
        (n = Object(i.r)(n) ? n : !r) !== r && (n ? g(t, e) : b(t, e))
    }

    function j(t, e, n) {
        t.setAttribute(e, n)
    }

    function w(t) {
        for (; t.firstChild;) t.removeChild(t.firstChild)
    }

    function O(t) {
        var e = document.createElement("link");
        e.rel = "stylesheet", e.href = t, document.getElementsByTagName("head")[0].appendChild(e)
    }

    function k(t) {
        t && w(t)
    }

    function C(t) {
        var e = {
            left: 0,
            right: 0,
            width: 0,
            height: 0,
            top: 0,
            bottom: 0
        };
        if (!t || !document.body.contains(t)) return e;
        var n = t.getBoundingClientRect(),
            r = window.pageYOffset,
            i = window.pageXOffset;
        return n.width || n.height || n.left || n.top ? (e.left = n.left + i, e.right = n.right + i, e.top = n.top + r, e.bottom = n.bottom + r, e.width = n.right - n.left, e.height = n.bottom - n.top, e) : e
    }

    function P(t, e) {
        t.insertBefore(e, t.firstChild)
    }

    function x(t) {
        return t.nextElementSibling
    }

    function S(t) {
        return t.previousElementSibling
    }

    function T(t, e) {
        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
            r = document.createElement("a");
        r.href = t, r.target = e, (r = Object(i.j)(r, n)).click()
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return l
    }), n.d(e, "d", function() {
        return f
    }), n.d(e, "b", function() {
        return d
    }), n.d(e, "c", function() {
        return p
    });
    var r = n(28),
        i = n(29),
        o = n(15),
        u = n(16),
        a = n(38),
        c = n(1),
        s = null,
        l = {};

    function f(t) {
        return s || (s = function(t) {
            var e = t.get("controls"),
                s = h(),
                f = function(t, e) {
                    var n = t.get("playlist");
                    if (Array.isArray(n) && n.length)
                        for (var u = Object(i.c)(Object(r.a)(n[0]), t), a = 0; a < u.length; a++)
                            for (var c = u[a], s = t.getProviders(), l = 0; l < o.a.length; l++) {
                                var f = o.a[l];
                                if (s.providerSupports(f, c)) return f.name === e
                            }
                    return !1
                }(t, "html5");
            if (e && s && f) return p = n.e(6).then(function(t) {
                n(37);
                var e = n(21).default;
                return a.a.controls = n(20).default, Object(u.a)(n(50).default), e
            }.bind(null, n)).catch(d(c.t + 105)), l.html5 = p, p;
            var p;
            if (e && f) return function() {
                var t = n.e(4).then(function(t) {
                    var e = n(21).default;
                    return a.a.controls = n(20).default, Object(u.a)(n(50).default), e
                }.bind(null, n)).catch(d(c.t + 104));
                return l.html5 = t, t
            }();
            if (e && s) return n.e(5).then(function(t) {
                n(37);
                var e = n(21).default;
                return a.a.controls = n(20).default, e
            }.bind(null, n)).catch(d(c.t + 103));
            if (e) return n.e(3).then(function(t) {
                var e = n(21).default;
                return a.a.controls = n(20).default, e
            }.bind(null, n)).catch(d(c.t + 102));
            return (h() ? n.e(8).then(function(t) {
                return n(37)
            }.bind(null, n)).catch(d(c.t + 120)) : Promise.resolve()).then(function() {
                return n.e(2).then(function(t) {
                    return n(21).default
                }.bind(null, n)).catch(d(c.t + 101))
            })
        }(t)), s
    }

    function d(t, e) {
        return function() {
            throw new c.s(c.m, t, e)
        }
    }

    function p(t, e) {
        return function() {
            throw new c.s(null, t, e)
        }
    }

    function h() {
        var t = window.IntersectionObserverEntry;
        return !(t && "IntersectionObserver" in window && "intersectionRatio" in t.prototype)
    }
}, function(t, e, n) {
    "use strict";
    n.r(e), n.d(e, "getAbsolutePath", function() {
        return o
    }), n.d(e, "isAbsolutePath", function() {
        return u
    }), n.d(e, "parseXML", function() {
        return a
    }), n.d(e, "serialize", function() {
        return c
    }), n.d(e, "parseDimension", function() {
        return s
    }), n.d(e, "timeFormat", function() {
        return l
    });
    var r = n(7),
        i = n(0);

    function o(t, e) {
        if (Object(r.exists)(e) || (e = document.location.href), Object(r.exists)(t)) {
            if (u(t)) return t;
            var n, i = e.substring(0, e.indexOf("://") + 3),
                o = e.substring(i.length, e.indexOf("/", i.length + 1));
            if (0 === t.indexOf("/")) n = t.split("/");
            else {
                var a = e.split("?")[0];
                n = (a = a.substring(i.length + o.length + 1, a.lastIndexOf("/"))).split("/").concat(t.split("/"))
            }
            for (var c = [], s = 0; s < n.length; s++) n[s] && Object(r.exists)(n[s]) && "." !== n[s] && (".." === n[s] ? c.pop() : c.push(n[s]));
            return i + o + "/" + c.join("/")
        }
    }

    function u(t) {
        return /^(?:(?:https?|file):)?\/\//.test(t)
    }

    function a(t) {
        var e = null;
        try {
            (e = (new window.DOMParser).parseFromString(t, "text/xml")).querySelector("parsererror") && (e = null)
        } catch (t) {}
        return e
    }

    function c(t) {
        if (void 0 === t) return null;
        if ("string" == typeof t && t.length < 6) {
            var e = t.toLowerCase();
            if ("true" === e) return !0;
            if ("false" === e) return !1;
            if (!Object(i.u)(Number(t)) && !Object(i.u)(parseFloat(t))) return Number(t)
        }
        return t
    }

    function s(t) {
        return "string" == typeof t ? "" === t ? 0 : t.lastIndexOf("%") > -1 ? t : parseInt(t.replace("px", ""), 10) : t
    }

    function l(t, e) {
        if (t <= 0 && !e || Object(i.u)(parseInt(t))) return "00:00";
        var n = t < 0 ? "-" : "";
        t = Math.abs(t);
        var r = Math.floor(t / 3600),
            o = Math.floor((t - 3600 * r) / 60),
            u = Math.floor(t % 60);
        return n + (r ? r + ":" : "") + (o < 10 ? "0" : "") + o + ":" + (u < 10 ? "0" : "") + u
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "b", function() {
        return i
    }), n.d(e, "c", function() {
        return o
    }), n.d(e, "a", function() {
        return u
    });
    var r = n(0),
        i = function(t) {
            return t.replace(/^(.*\/)?([^-]*)-?.*\.(js)$/, "$2")
        };

    function o(t) {
        var e = 305e3;
        if (!t) return e;
        switch (i(t)) {
            case "jwpsrv":
                e = 305001;
                break;
            case "googima":
                e = 305002;
                break;
            case "vast":
                e = 305003;
                break;
            case "freewheel":
                e = 305004;
                break;
            case "dai":
                e = 305005;
                break;
            case "gapro":
                e = 305006
        }
        return e
    }

    function u(t, e, n) {
        var i = t.name,
            o = document.createElement("div");
        o.id = n.id + "_" + i, o.className = "jw-plugin jw-reset";
        var u = Object(r.j)({}, e),
            a = t.getNewInstance(n, u, o);
        return n.addPlugin(i, a), a
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "j", function() {
        return p
    }), n.d(e, "d", function() {
        return h
    }), n.d(e, "b", function() {
        return v
    }), n.d(e, "e", function() {
        return b
    }), n.d(e, "g", function() {
        return y
    }), n.d(e, "h", function() {
        return j
    }), n.d(e, "c", function() {
        return w
    }), n.d(e, "f", function() {
        return k
    }), n.d(e, "i", function() {
        return C
    }), n.d(e, "a", function() {
        return P
    });
    var r = n(0),
        i = n(5),
        o = n(27),
        u = n(7),
        a = n(40),
        c = {},
        s = {
            zh: "Chinese",
            nl: "Dutch",
            en: "English",
            fr: "French",
            de: "German",
            it: "Italian",
            ja: "Japanese",
            pt: "Portuguese",
            ru: "Russian",
            es: "Spanish",
            el: "Greek",
            fi: "Finnish",
            id: "Indonesian",
            ko: "Korean",
            th: "Thai",
            vi: "Vietnamese"
        },
        l = Object(r.q)(s);

    function f(t) {
        var e = d(t),
            n = e.indexOf("_");
        return -1 === n ? e : e.substring(0, n)
    }

    function d(t) {
        return t.toLowerCase().replace("-", "_")
    }

    function p(t) {
        return t ? Object.keys(t).reduce(function(e, n) {
            return e[d(n)] = t[n], e
        }, {}) : {}
    }

    function h(t) {
        if (t) return 3 === t.length ? t : s[f(t)] || t
    }

    function v(t) {
        return l[t] || ""
    }

    function g(t) {
        var e = t.querySelector("html");
        return e ? e.getAttribute("lang") : null
    }

    function b() {
        var t = g(document);
        if (!t && Object(i.m)()) try {
            t = g(window.top.document)
        } catch (t) {}
        return t || navigator.language || "en"
    }
    var m = ["ar", "da", "de", "es", "fi", "fr", "he", "id", "it", "ja", "ko", "nl", "no", "pt", "ro", "ru", "sv", "th", "tr", "vi", "zh"];

    function y(t) {
        return 8207 === t.charCodeAt(0) || /^[\u0591-\u07FF\uFB1D-\uFDFD\uFE70-\uFEFC]/.test(t)
    }

    function j(t) {
        return m.indexOf(f(t)) >= 0
    }

    function w(t, e, n) {
        return Object(r.j)({}, function(t) {
            var e = t.advertising,
                n = t.related,
                i = t.sharing,
                o = t.abouttext,
                u = Object(r.j)({}, t.localization);
            e && (u.advertising = u.advertising || {}, O(u.advertising, e, "admessage"), O(u.advertising, e, "cuetext"), O(u.advertising, e, "loadingAd"), O(u.advertising, e, "podmessage"), O(u.advertising, e, "skipmessage"), O(u.advertising, e, "skiptext"));
            "string" == typeof u.related ? u.related = {
                heading: u.related
            } : u.related = u.related || {};
            n && O(u.related, n, "autoplaymessage");
            i && (u.sharing = u.sharing || {}, O(u.sharing, i, "heading"), O(u.sharing, i, "copied"));
            o && O(u, t, "abouttext");
            var a = u.close || u.nextUpClose;
            a && (u.close = a);
            return u
        }(t), e[f(n)], e[d(n)])
    }

    function O(t, e, n) {
        var r = t[n] || e[n];
        r && (t[n] = r)
    }

    function k(t) {
        return Object(u.isDeepKeyCompliant)(a.a, t, function(t, e) {
            return "string" == typeof e[t]
        })
    }

    function C(t, e) {
        var n = c[e];
        if (!n) {
            var r = "".concat(t, "translations/").concat(f(e), ".json");
            c[e] = n = new Promise(function(t, n) {
                Object(o.a)({
                    url: r,
                    oncomplete: t,
                    onerror: function(t, r, i, o) {
                        c[e] = null, n(o)
                    },
                    responseType: "json"
                })
            })
        }
        return n
    }

    function P(t, e) {
        var n = Object(r.j)({}, t, e);
        return x(n, "errors", t, e), x(n, "related", t, e), x(n, "sharing", t, e), x(n, "advertising", t, e), n
    }

    function x(t, e, n, i) {
        t[e] = Object(r.j)({}, n[e], i[e])
    }
}, function(t, e, n) {
    "use strict";
    e.a = []
}, function(t, e, n) {
    "use strict";
    var r = n(32),
        i = n(6),
        o = n(18),
        u = n(0),
        a = n(7),
        c = n(36),
        s = Object(u.l)(r.a, Object(u.B)({
            name: "html5"
        })),
        l = s.supports;

    function f(t) {
        var e = window.MediaSource;
        return Object(u.a)(t, function(t) {
            return !!e && !!e.isTypeSupported && e.isTypeSupported(t)
        })
    }
    s.supports = function(t, e) {
        var n = l.apply(this, arguments);
        if (n && t.drm && "hls" === t.type) {
            var r = Object(o.a)(e)("drm");
            if (r && t.drm.fairplay) {
                var i = window.WebKitMediaKeys;
                return i && i.isTypeSupported && i.isTypeSupported("com.apple.fps.1_0", "video/mp4")
            }
            return r
        }
        return n
    }, r.a.push({
        name: "shaka",
        supports: function(t) {
            return !(t.drm && !Object(c.a)(t.drm)) && (!(!window.HTMLVideoElement || !window.MediaSource) && (f(t.mediaTypes) && ("dash" === t.type || "mpd" === t.type || (t.file || "").indexOf("mpd-time-csf") > -1)))
        }
    }), r.a.splice(0, 0, {
        name: "hlsjs",
        supports: function(t) {
            if (t.drm) return !1;
            var e = t.file.indexOf(".m3u8") > -1,
                n = "hls" === t.type || "m3u8" === t.type;
            if (!e && !n) return !1;
            var r = i.Browser.chrome || i.Browser.firefox || i.Browser.edge || i.Browser.ie && 11 === i.Browser.version.major,
                o = i.OS.android && !1 === t.hlsjsdefault,
                u = i.Browser.safari && !!t.safarihlsjs;
            return f(t.mediaTypes || ['video/mp4;codecs="avc1.4d400d,mp4a.40.2"']) && (r || u) && !o
        }
    }), r.a.push({
        name: "flash",
        supports: function(t) {
            if (!i.Features.flash || t.drm) return !1;
            var e = t.type;
            return "hls" === e || "m3u8" === e || !Object(a.isRtmp)(t.file, e) && ["flv", "f4v", "mov", "m4a", "m4v", "mp4", "aac", "f4a", "mp3", "mpeg", "smil"].indexOf(e) > -1
        }
    }), e.a = r.a
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return a
    });
    var r = n(33),
        i = n(15),
        o = n(55),
        u = n(0);

    function a(t) {
        var e = t.getName().name;
        if (!r.a[e]) {
            if (!Object(u.l)(i.a, Object(u.B)({
                    name: e
                }))) {
                if (!Object(u.t)(t.supports)) throw new Error("Tried to register a provider with an invalid object");
                i.a.unshift({
                    name: e,
                    supports: t.supports
                })
            }
            Object(u.g)(t.prototype, o.a), r.a[e] = t
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return r
    });
    var r = Date.now || function() {
        return (new Date).getTime()
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return h
    });
    var r = "free",
        i = "starter",
        o = "business",
        u = "premium",
        a = "enterprise",
        c = "developer",
        s = "platinum",
        l = "ads",
        f = "unlimited",
        d = "trial",
        p = "invalid";

    function h(t) {
        var e = {
            setup: [r, i, o, u, a, c, l, f, d, s],
            drm: [a, c, l, f, d],
            ads: [l, f, d, s, a, c, o],
            jwpsrv: [r, i, o, u, a, c, l, d, s, p],
            discovery: [l, a, c, d, f]
        };
        return function(n) {
            return e[n] && e[n].indexOf(t) > -1
        }
    }
}, function(t, e, n) {
    "use strict";
    n.r(e), n.d(e, "getScriptPath", function() {
        return o
    }), n.d(e, "repo", function() {
        return u
    }), n.d(e, "versionCheck", function() {
        return a
    }), n.d(e, "loadFrom", function() {
        return c
    });
    var r = n(30),
        i = n(7),
        o = function(t) {
            for (var e = document.getElementsByTagName("script"), n = 0; n < e.length; n++) {
                var r = e[n].src;
                if (r) {
                    var i = r.lastIndexOf("/" + t);
                    if (i >= 0) return r.substr(0, i + 1)
                }
            }
            return ""
        },
        u = function() {
            var t = "playergk/jwplayer885/js/v/8.8.5/",
                e = Object(i.isFileProtocol)() ? "https:" : "";
            return "".concat(e).concat(t)
        },
        a = function(t) {
            var e = ("0" + t).split(/\W/),
                n = r.a.split(/\W/),
                i = parseFloat(e[0]),
                o = parseFloat(n[0]);
            return !(i > o) && !(i === o && parseFloat("0" + e[1]) > parseFloat(n[1]))
        },
        c = function() {
            return u()
        }
}, , , function(t, e, n) {
    "use strict";
    e.a = {
        debug: !1
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return c
    }), n.d(e, "b", function() {
        return s
    }), n.d(e, "d", function() {
        return l
    }), n.d(e, "e", function() {
        return p
    }), n.d(e, "c", function() {
        return h
    });
    var r = n(2),
        i = n(41),
        o = n.n(i);

    function u(t) {
        return (u = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }
    var a, c = o.a.clear;

    function s(t, e, n, r) {
        n = n || "all-players";
        var i = "";
        if ("object" === u(e)) {
            var a = document.createElement("div");
            l(a, e);
            var c = a.style.cssText;
            Object.prototype.hasOwnProperty.call(e, "content") && c && (c = "".concat(c, ' content: "').concat(e.content, '";')), r && c && (c = c.replace(/;/g, " !important;")), i = "{" + c + "}"
        } else "string" == typeof e && (i = e);
        "" !== i && "{}" !== i ? o.a.style([
            [t, t + i]
        ], n) : o.a.clear(n, t)
    }

    function l(t, e) {
        if (null != t) {
            var n;
            void 0 === t.length && (t = [t]);
            var r = {};
            for (n in e) Object.prototype.hasOwnProperty.call(e, n) && (r[n] = d(n, e[n]));
            for (var i = 0; i < t.length; i++) {
                var o = t[i],
                    u = void 0;
                if (null != o)
                    for (n in r) Object.prototype.hasOwnProperty.call(r, n) && (u = f(n), o.style[u] !== r[n] && (o.style[u] = r[n]))
            }
        }
    }

    function f(t) {
        t = t.split("-");
        for (var e = 1; e < t.length; e++) t[e] = t[e].charAt(0).toUpperCase() + t[e].slice(1);
        return t.join("")
    }

    function d(t, e) {
        return "" === e || null == e ? "" : "string" == typeof e && isNaN(e) ? /png|gif|jpe?g/i.test(e) && e.indexOf("url") < 0 ? "url(" + e + ")" : e : 0 === e || "z-index" === t || "opacity" === t ? "" + e : /color/i.test(t) ? "#" + Object(r.d)(e.toString(16).replace(/^0x/i, ""), 6) : Math.ceil(e) + "px"
    }

    function p(t, e) {
        l(t, {
            transform: e,
            webkitTransform: e,
            msTransform: e,
            mozTransform: e,
            oTransform: e
        })
    }

    function h(t, e) {
        var n = "rgb",
            r = void 0 !== e && 100 !== e;
        if (r && (n += "a"), !a) {
            var i = document.createElement("canvas");
            i.height = 1, i.width = 1, a = i.getContext("2d")
        }
        t ? isNaN(parseInt(t, 16)) || (t = "#" + t) : t = "#000000", a.clearRect(0, 0, 1, 1), a.fillStyle = t, a.fillRect(0, 0, 1, 1);
        var o = a.getImageData(0, 0, 1, 1).data;
        return n += "(" + o[0] + ", " + o[1] + ", " + o[2], r && (n += ", " + e / 100), n + ")"
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(8),
        o = n(3),
        u = {},
        a = 45e3,
        c = 2,
        s = 3;

    function l(t) {
        var e = document.createElement("link");
        return e.type = "text/css", e.rel = "stylesheet", e.href = t, e
    }

    function f(t) {
        var e = document.createElement("script");
        return e.type = "text/javascript", e.charset = "utf-8", e.async = !0, e.timeout = a, e.src = t, e
    }
    var d = function(t, e) {
        var n = this,
            r = 0;

        function i(t) {
            r = c, n.trigger(o.w, t).off()
        }

        function d(t) {
            r = s, n.trigger(o.lb, t).off()
        }
        this.getStatus = function() {
            return r
        }, this.load = function() {
            var n = u[t];
            return 0 !== r ? n : (n && n.then(d).catch(i), r = 1, n = new Promise(function(n, r) {
                var o = (e ? l : f)(t),
                    u = function() {
                        o.onerror = o.onload = null, clearTimeout(s)
                    },
                    c = function(t) {
                        u(), i(t), r(t)
                    },
                    s = setTimeout(function() {
                        c(new Error("Network timeout ".concat(t)))
                    }, a);
                o.onerror = function() {
                    c(new Error("Failed to load ".concat(t)))
                }, o.onload = function(t) {
                    u(), d(t), n(t)
                };
                var p = document.getElementsByTagName("head")[0] || document.documentElement;
                p.insertBefore(o, p.firstChild)
            }), u[t] = n, n)
        }
    };
    Object(r.j)(d.prototype, i.a), e.a = d
}, function(t, e, n) {
    "use strict";
    var r = n(1),
        i = n(12);

    function o(t) {
        return (o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }
    var u = function() {
            this.load = function(t, e, n, u) {
                return n && "object" === o(n) ? Promise.all(Object.keys(n).filter(function(t) {
                    return t
                }).map(function(o) {
                    var a = n[o];
                    return e.setupPlugin(o).then(function(e) {
                        if (!u.attributes._destroyed) return Object(i.a)(e, a, t)
                    }).catch(function(t) {
                        return e.removePlugin(o), t.code ? t : new r.s(null, Object(i.c)(o), t)
                    })
                })) : Promise.resolve()
            }
        },
        a = n(46),
        c = n(47),
        s = {},
        l = function() {},
        f = l.prototype;
    f.setupPlugin = function(t) {
        var e = this.getPlugin(t);
        return e ? (e.url !== t && Object(c.a)('JW Plugin "'.concat(Object(i.b)(t), '" already loaded from "').concat(e.url, '". Ignoring "').concat(t, '."')), e.promise) : this.addPlugin(t).load()
    }, f.addPlugin = function(t) {
        var e = Object(i.b)(t),
            n = s[e];
        return n || (n = new a.a(t), s[e] = n), n
    }, f.getPlugin = function(t) {
        return s[Object(i.b)(t)]
    }, f.removePlugin = function(t) {
        delete s[Object(i.b)(t)]
    }, f.getPlugins = function() {
        return s
    };
    var d = l;
    n.d(e, "b", function() {
        return h
    }), n.d(e, "a", function() {
        return v
    });
    var p = new d,
        h = function(t, e, n) {
            var r = p.addPlugin(t);
            r.js || r.registerPlugin(t, e, n)
        };

    function v(t, e) {
        var n = t.get("plugins");
        return window.jwplayerPluginJsonp = h, (t.pluginLoader = t.pluginLoader || new u).load(e, p, n, t).then(function(e) {
            if (!t.attributes._destroyed) return delete window.jwplayerPluginJsonp, e
        })
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return a
    });
    var r = n(48),
        i = n(18),
        o = n(44),
        u = n(1),
        a = 100013;
    e.b = function(t) {
        var e, n, c;
        try {
            var s = Object(r.a)(t || "", Object(o.a)("NDh2aU1Cb0NHRG5hcDFRZQ==")).split("/");
            if ("pro" === (e = s[0]) && (e = "premium"), Object(i.a)(e)("setup") || (e = "invalid"), s.length > 2) {
                n = s[1];
                var l = parseInt(s[2]);
                l > 0 && (c = new Date).setTime(l)
            }
        } catch (t) {
            e = "invalid"
        }
        this.edition = function() {
            return e
        }, this.token = function() {
            return n
        }, this.expiration = function() {
            return c
        }, this.duration = function() {
            return c ? c.getTime() - (new Date).getTime() : 0
        }, this.error = function() {
            var r;
            return void 0 === t ? r = 100011 : "invalid" !== e && n ? this.duration() < 0 && (r = a) : r = 100012, r ? new u.s(u.m, r) : null
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return m
    });
    var r = n(0),
        i = n(11),
        o = n(7),
        u = n(1),
        a = 1,
        c = 2,
        s = 3,
        l = 4,
        f = 5,
        d = 6,
        p = 7,
        h = 601,
        v = 602,
        g = 611,
        b = function() {};

    function m(t, e, n, h) {
        var O;
        t === Object(t) && (t = (h = t).url);
        var k = Object(r.j)({
                xhr: null,
                url: t,
                withCredentials: !1,
                retryWithoutCredentials: !1,
                timeout: 6e4,
                timeoutId: -1,
                oncomplete: e || b,
                onerror: n || b,
                mimeType: h && !h.responseType ? "text/xml" : "",
                requireValidXML: !1,
                responseType: h && h.plainText ? "text" : "",
                useDomParser: !1,
                requestFilter: null
            }, h),
            C = function(t, e) {
                return function(t, n) {
                    var i = t.currentTarget || e.xhr;
                    if (clearTimeout(e.timeoutId), e.retryWithoutCredentials && e.xhr.withCredentials) {
                        y(i);
                        var o = Object(r.j)({}, e, {
                            xhr: null,
                            withCredentials: !1,
                            retryWithoutCredentials: !1
                        });
                        m(o)
                    } else !n && i.status >= 400 && i.status < 600 && (n = i.status), j(e, n ? u.o : u.r, n || d, t)
                }
            }(0, k);
        if ("XMLHttpRequest" in window) {
            if (O = k.xhr = k.xhr || new window.XMLHttpRequest, "function" == typeof k.requestFilter) {
                var P;
                try {
                    P = k.requestFilter({
                        url: t,
                        xhr: O
                    })
                } catch (t) {
                    return C(t, f), O
                }
                P && "open" in P && "send" in P && (O = k.xhr = P)
            }
            O.onreadystatechange = function(t) {
                return function(e) {
                    var n = e.currentTarget || t.xhr;
                    if (4 === n.readyState) {
                        clearTimeout(t.timeoutId);
                        var a = n.status;
                        if (a >= 400) return void j(t, u.o, a < 600 ? a : d);
                        if (200 === a) return function(t) {
                            return function(e) {
                                var n = e.currentTarget || t.xhr;
                                if (clearTimeout(t.timeoutId), t.responseType) {
                                    if ("json" === t.responseType) return function(t, e) {
                                        if (!t.response || "string" == typeof t.response && '"' !== t.responseText.substr(1)) try {
                                            t = Object(r.j)({}, t, {
                                                response: JSON.parse(t.responseText)
                                            })
                                        } catch (t) {
                                            return void j(e, u.o, g, t)
                                        }
                                        return e.oncomplete(t)
                                    }(n, t)
                                } else {
                                    var o, a = n.responseXML;
                                    if (a) try {
                                        o = a.firstChild
                                    } catch (t) {}
                                    if (a && o) return w(n, a, t);
                                    if (t.useDomParser && n.responseText && !a && (a = Object(i.parseXML)(n.responseText)) && a.firstChild) return w(n, a, t);
                                    if (t.requireValidXML) return void j(t, u.o, v)
                                }
                                t.oncomplete(n)
                            }
                        }(t)(e);
                        0 === a && Object(o.isFileProtocol)() && !/^[a-z][a-z0-9+.-]*:/.test(t.url) && j(t, u.o, p)
                    }
                }
            }(k), O.onerror = C, "overrideMimeType" in O ? k.mimeType && O.overrideMimeType(k.mimeType) : k.useDomParser = !0;
            try {
                t = t.replace(/#.*$/, ""), O.open("GET", t, !0)
            } catch (t) {
                return C(t, s), O
            }
            if (k.responseType) try {
                O.responseType = k.responseType
            } catch (t) {}
            k.timeout && (k.timeoutId = setTimeout(function() {
                y(O), j(k, u.r, a)
            }, k.timeout), O.onabort = function() {
                clearTimeout(k.timeoutId)
            });
            try {
                k.withCredentials && "withCredentials" in O && (O.withCredentials = !0), O.send()
            } catch (t) {
                C(t, l)
            }
            return O
        }
        j(k, u.r, c)
    }

    function y(t) {
        t.onload = null, t.onprogress = null, t.onreadystatechange = null, t.onerror = null, "abort" in t && t.abort()
    }

    function j(t, e, n, r) {
        t.onerror(e, t.url, t.xhr, new u.s(e, n, r))
    }

    function w(t, e, n) {
        var i = e.documentElement;
        if (!n.requireValidXML || "parsererror" !== i.nodeName && !i.getElementsByTagName("parsererror").length) return t.responseXML || (t = Object(r.j)({}, t, {
            responseXML: e
        })), n.oncomplete(t);
        j(n, u.o, h)
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(34),
        o = function(t) {
            if (t && t.file) return Object(r.j)({}, {
                kind: "captions",
                default: !1
            }, t)
        },
        u = Array.isArray;
    e.a = function(t) {
        u((t = t || {}).tracks) || delete t.tracks;
        var e = Object(r.j)({}, {
            sources: [],
            tracks: [],
            minDvrWindow: 120,
            dvrSeekLimit: 25
        }, t);
        e.dvrSeekLimit < 5 && (e.dvrSeekLimit = 5), e.sources !== Object(e.sources) || u(e.sources) || (e.sources = [Object(i.a)(e.sources)]), u(e.sources) && 0 !== e.sources.length || (t.levels ? e.sources = t.levels : e.sources = [Object(i.a)(t)]);
        for (var n = 0; n < e.sources.length; n++) {
            var a = e.sources[n];
            if (a) {
                var c = a.default;
                a.default = !!c && "true" === c.toString(), e.sources[n].label || (e.sources[n].label = n.toString()), e.sources[n] = Object(i.a)(e.sources[n])
            }
        }
        return e.sources = e.sources.filter(function(t) {
            return !!t
        }), u(e.tracks) || (e.tracks = []), u(e.captions) && (e.tracks = e.tracks.concat(e.captions), delete e.captions), e.tracks = e.tracks.map(o).filter(function(t) {
            return !!t
        }), e
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = {
            none: !0,
            metadata: !0,
            auto: !0
        };

    function o(t, e) {
        return i[t] ? t : i[e] ? e : "metadata"
    }
    var u = n(28),
        a = n(34),
        c = n(42),
        s = n(1);
    n.d(e, "b", function() {
        return l
    }), n.d(e, "e", function() {
        return f
    }), n.d(e, "d", function() {
        return d
    }), n.d(e, "c", function() {
        return p
    });

    function l(t, e, n) {
        return delete Object(r.j)({}, n).playlist, t.map(function(t) {
            return d(e, t, n)
        }).filter(function(t) {
            return !!t
        })
    }

    function f(t) {
        if (!Array.isArray(t) || 0 === t.length) throw new s.s(s.o, 630)
    }

    function d(t, e, n) {
        var i = t.getProviders(),
            u = t.get("preload"),
            a = Object(r.j)({}, e);
        if (a.preload = o(e.preload, u), a.allSources = h(e, t), a.sources = v(a.allSources, i), a.sources.length) return a.file = a.sources[0].file, a.feedData = n, a
    }
    var p = function(t, e) {
        return v(h(t, e), e.getProviders())
    };

    function h(t, e) {
        var n = e.attributes,
            r = t.sources,
            i = t.allSources,
            u = t.preload,
            c = t.drm,
            s = g(t.withCredentials, n.withCredentials);
        return (i || r).map(function(t) {
            if (t !== Object(t)) return null;
            b(t, n, "androidhls"), b(t, n, "hlsjsdefault"), b(t, n, "safarihlsjs"), t.preload = o(t.preload, u);
            var e = t.drm || c || n.drm;
            e && (t.drm = e);
            var r = g(t.withCredentials, s);
            return void 0 !== r && (t.withCredentials = r), Object(a.a)(t)
        }).filter(function(t) {
            return !!t
        })
    }

    function v(t, e) {
        e && e.choose || (e = new c.a);
        var n = function(t, e) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n],
                    i = e.choose(r),
                    o = i.providerToCheck;
                if (o) return {
                    type: r.type,
                    provider: o
                }
            }
            return null
        }(t, e);
        if (!n) return [];
        var r = n.provider,
            i = n.type;
        return t.filter(function(t) {
            return t.type === i && e.providerSupports(r, t)
        })
    }

    function g(t, e) {
        return void 0 === t ? e : t
    }

    function b(t, e, n) {
        n in e && (t[n] = e[n])
    }
    e.a = function(t) {
        return (Array.isArray(t) ? t : [t]).map(u.a)
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return r
    });
    var r = "8.8.5+commercial_v8-8-5.319.commercial.0820c98.hlsjs..jwplayer.d97ec77.dai.45542e3.freewheel.9422044.googima.be298d1.vast.e4647a1.analytics.f3dc2fa.gapro.8d11024"
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(17),
        o = window.performance || {
            timing: {}
        },
        u = o.timing.navigationStart || Object(i.a)();

    function a() {
        return u + o.now()
    }
    "now" in o || (o.now = function() {
        return Object(i.a)() - u
    });
    e.a = function() {
        var t = {},
            e = {},
            n = {},
            i = {};
        return {
            start: function(e) {
                t[e] = a(), n[e] = n[e] + 1 || 1
            },
            end: function(n) {
                if (t[n]) {
                    var r = a() - t[n];
                    delete t[n], e[n] = e[n] + r || r
                }
            },
            dump: function() {
                var o = Object(r.j)({}, e);
                for (var u in t)
                    if (Object.prototype.hasOwnProperty.call(t, u)) {
                        var c = a() - t[u];
                        o[u] = o[u] + c || c
                    }
                return {
                    counts: Object(r.j)({}, n),
                    sums: o,
                    events: Object(r.j)({}, i)
                }
            },
            tick: function(t) {
                i[t] = a()
            },
            clear: function(t) {
                delete i[t]
            },
            between: function(t, e) {
                return i[e] && i[t] ? i[e] - i[t] : null
            }
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "b", function() {
        return c
    });
    var r = n(59),
        i = n(7),
        o = n(39),
        u = {
            aac: "audio/mp4",
            mp4: "video/mp4",
            f4v: "video/mp4",
            m4v: "video/mp4",
            mov: "video/mp4",
            mp3: "audio/mpeg",
            mpeg: "audio/mpeg",
            ogv: "video/ogg",
            ogg: "video/ogg",
            oga: "video/ogg",
            vorbis: "video/ogg",
            webm: "video/webm",
            f4a: "video/aac",
            m3u8: "application/vnd.apple.mpegurl",
            m3u: "application/vnd.apple.mpegurl",
            hls: "application/vnd.apple.mpegurl"
        },
        a = [{
            name: "html5",
            supports: c
        }];

    function c(t) {
        if (!1 === Object(r.a)(t)) return !1;
        if (!o.a.canPlayType) return !1;
        var e = t.file,
            n = t.type;
        if (Object(i.isRtmp)(e, n)) return !1;
        var a = t.mimeType || u[n];
        if (!a) return !1;
        var c = t.mediaTypes;
        return c && c.length && (a = [a].concat(c.slice()).join("; ")), !!o.a.canPlayType(a)
    }
    e.a = a
}, function(t, e, n) {
    "use strict";
    e.a = {}
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(7),
        o = n(2);
    e.a = function(t) {
        if (t && t.file) {
            var e = Object(r.j)({}, {
                default: !1
            }, t);
            e.file = Object(o.h)("" + e.file);
            var n = /^[^\/]+\/(?:x-)?([^\/]+)$/;
            if (n.test(e.type) && (e.mimeType = e.type, e.type = e.type.replace(n, "$1")), Object(i.isYouTube)(e.file) ? e.type = "youtube" : Object(i.isRtmp)(e.file) ? e.type = "rtmp" : e.type || (e.type = Object(o.a)(e.file)), e.type) {
                switch (e.type) {
                    case "m3u8":
                    case "vnd.apple.mpegurl":
                        e.type = "hls";
                        break;
                    case "dash+xml":
                        e.type = "dash";
                        break;
                    case "m4a":
                        e.type = "aac";
                        break;
                    case "smil":
                        e.type = "rtmp"
                }
                return Object.keys(e).forEach(function(t) {
                    "" === e[t] && delete e[t]
                }), e
            }
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return x
    }), n.d(e, "b", function() {
        return A
    });
    var r = n(6),
        i = n(3),
        o = n(8),
        u = n(17),
        a = n(9);

    function c(t) {
        return (c = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }

    function s(t, e) {
        for (var n = 0; n < e.length; n++) {
            var r = e[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r)
        }
    }

    function l(t, e) {
        return !e || "object" !== c(e) && "function" != typeof e ? function(t) {
            if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return t
        }(t) : e
    }

    function f(t, e, n) {
        return (f = "undefined" != typeof Reflect && Reflect.get ? Reflect.get : function(t, e, n) {
            var r = function(t, e) {
                for (; !Object.prototype.hasOwnProperty.call(t, e) && null !== (t = d(t)););
                return t
            }(t, e);
            if (r) {
                var i = Object.getOwnPropertyDescriptor(r, e);
                return i.get ? i.get.call(n) : i.value
            }
        })(t, e, n || t)
    }

    function d(t) {
        return (d = Object.setPrototypeOf ? Object.getPrototypeOf : function(t) {
            return t.__proto__ || Object.getPrototypeOf(t)
        })(t)
    }

    function p(t, e) {
        return (p = Object.setPrototypeOf || function(t, e) {
            return t.__proto__ = e, t
        })(t, e)
    }
    var h, v, g = "ontouchstart" in window,
        b = "PointerEvent" in window && !r.OS.android,
        m = !(b || g && r.OS.mobile),
        y = "window",
        j = "keydown",
        w = r.Features.passiveEvents,
        O = !!w && {
            passive: !0
        },
        k = 6,
        C = 300,
        P = 500,
        x = function(t) {
            function e(t, n) {
                var r;
                ! function(t, e) {
                    if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                }(this, e), r = l(this, d(e).call(this));
                var i = !(n = n || {}).preventScrolling;
                return r.directSelect = !!n.directSelect, r.dragged = !1, r.enableDoubleTap = !1, r.el = t, r.handlers = {}, r.options = {}, r.lastClick = 0, r.lastStart = 0, r.passive = i, r.pointerId = null, r.startX = 0, r.startY = 0, r.event = null, r
            }
            var n, r, i;
            return function(t, e) {
                if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
                t.prototype = Object.create(e && e.prototype, {
                    constructor: {
                        value: t,
                        writable: !0,
                        configurable: !0
                    }
                }), e && p(t, e)
            }(e, o["a"]), n = e, (r = [{
                key: "on",
                value: function(t, n, r) {
                    return T(t) && (this.handlers[t] || _[t](this)), f(d(e.prototype), "on", this).call(this, t, n, r)
                }
            }, {
                key: "off",
                value: function(t, n, r) {
                    var i = this;
                    if (T(t)) N(this, t);
                    else if (!t) {
                        var o = this.handlers;
                        Object.keys(o).forEach(function(t) {
                            N(i, t)
                        })
                    }
                    return f(d(e.prototype), "off", this).call(this, t, n, r)
                }
            }, {
                key: "destroy",
                value: function() {
                    this.off(), b && M(this), this.el = null
                }
            }]) && s(n.prototype, r), i && s(n, i), e
        }(),
        S = /\s+/;

    function T(t) {
        return t && !(S.test(t) || "object" === c(t))
    }

    function E(t) {
        if (!t.handlers.init) {
            var e = t.el,
                n = t.passive,
                r = !!w && {
                    passive: n
                },
                o = function(i) {
                    if (Object(a.n)(e, "jw-tab-focus"), ! function(t) {
                            if ("which" in t) return 3 === t.which;
                            if ("button" in t) return 2 === t.button;
                            return !1
                        }(i)) {
                        var o = i.target,
                            l = i.type;
                        if (!t.directSelect || o === e) {
                            var f = R(i),
                                d = f.pageX,
                                p = f.pageY;
                            if (t.dragged = !1, t.lastStart = Object(u.a)(), t.startX = d, t.startY = p, N(t, y), "pointerdown" === l && i.isPrimary) {
                                if (!n) {
                                    var h = i.pointerId;
                                    t.pointerId = h, e.setPointerCapture(h)
                                }
                                F(t, y, "pointermove", c, r), F(t, y, "pointercancel", s), F(t, y, "pointerup", s), "BUTTON" === e.tagName && e.focus()
                            } else "mousedown" === l ? (F(t, y, "mousemove", c, r), F(t, y, "mouseup", s)) : "touchstart" === l && (F(t, y, "touchmove", c, r), F(t, y, "touchcancel", s), F(t, y, "touchend", s), n || D(i))
                        }
                    }
                },
                c = function(e) {
                    if (t.dragged) L(t, i.s, e);
                    else {
                        var r = R(e),
                            o = r.pageX,
                            u = r.pageY,
                            a = o - t.startX,
                            c = u - t.startY;
                        a * a + c * c > k * k && (L(t, i.u, e), t.dragged = !0, L(t, i.s, e))
                    }
                    n || "touchmove" !== e.type || D(e)
                },
                s = function(n) {
                    if (clearTimeout(h), t.el)
                        if (M(t), N(t, y), t.dragged) t.dragged = !1, L(t, i.t, n);
                        else if (-1 === n.type.indexOf("cancel") && e.contains(n.target)) {
                        if (Object(u.a)() - t.lastStart > P) return;
                        var r = "pointerup" === n.type || "pointercancel" === n.type,
                            o = "mouseup" === n.type || r && "mouse" === n.pointerType;
                        ! function(t, e, n) {
                            if (t.enableDoubleTap)
                                if (Object(u.a)() - t.lastClick < C) {
                                    var r = n ? i.q : i.r;
                                    L(t, r, e), t.lastClick = 0
                                } else t.lastClick = Object(u.a)()
                        }(t, n, o), o ? L(t, i.n, n) : (L(t, i.sb, n), "touchend" !== n.type || w || D(n))
                    }
                };
            b ? F(t, "init", "pointerdown", o, r) : (m && F(t, "init", "mousedown", o, r), F(t, "init", "touchstart", o, r)), v || (v = new x(document).on("interaction")), F(t, "init", "blur", function() {
                Object(a.n)(e, "jw-tab-focus")
            }), F(t, "init", "focus", function() {
                v.event && v.event.type === j && Object(a.a)(e, "jw-tab-focus")
            })
        }
    }
    var _ = {
        drag: function(t) {
            E(t)
        },
        dragStart: function(t) {
            E(t)
        },
        dragEnd: function(t) {
            E(t)
        },
        click: function(t) {
            E(t)
        },
        tap: function(t) {
            E(t)
        },
        doubleTap: function(t) {
            t.enableDoubleTap = !0, E(t)
        },
        doubleClick: function(t) {
            t.enableDoubleTap = !0, E(t)
        },
        longPress: function(t) {
            if (r.OS.iOS) {
                var e = function() {
                    clearTimeout(h)
                };
                F(t, "longPress", "touchstart", function(n) {
                    e(), h = setTimeout(function() {
                        L(t, "longPress", n)
                    }, P)
                }), F(t, "longPress", "touchmove", e), F(t, "longPress", "touchcancel", e), F(t, "longPress", "touchend", e)
            } else t.el.oncontextmenu = function(e) {
                return L(t, "longPress", e), !1
            }
        },
        focus: function(t) {
            F(t, "focus", "focus", function(e) {
                I(t, "focus", e)
            })
        },
        blur: function(t) {
            F(t, "blur", "blur", function(e) {
                I(t, "blur", e)
            })
        },
        over: function(t) {
            (b || m) && F(t, i.Z, b ? "pointerover" : "mouseover", function(e) {
                "touch" !== e.pointerType && L(t, i.Z, e)
            })
        },
        out: function(t) {
            if (b) {
                var e = t.el;
                F(t, i.Y, "pointerout", function(n) {
                    if ("touch" !== n.pointerType && "x" in n) {
                        var r = document.elementFromPoint(n.x, n.y);
                        e.contains(r) || L(t, i.Y, n)
                    }
                })
            } else m && F(t, i.Y, "mouseout", function(e) {
                L(t, i.Y, e)
            })
        },
        move: function(t) {
            (b || m) && F(t, i.W, b ? "pointermove" : "mousemove", function(e) {
                "touch" !== e.pointerType && L(t, i.W, e)
            })
        },
        enter: function(t) {
            F(t, i.v, j, function(e) {
                "Enter" !== e.key && 13 !== e.keyCode || (e.stopPropagation(), I(t, i.v, e))
            })
        },
        keydown: function(t) {
            F(t, j, j, function(e) {
                I(t, j, e)
            }, !1)
        },
        gesture: function(t) {
            var e = function(e) {
                return L(t, "gesture", e)
            };
            F(t, "gesture", "click", e), F(t, "gesture", j, e)
        },
        interaction: function(t) {
            var e = function(e) {
                t.event = e
            };
            F(t, "interaction", "mousedown", e, !0), F(t, "interaction", j, e, !0)
        }
    };

    function A(t) {
        var e = t.ownerDocument || t;
        return e.defaultView || e.parentWindow || window
    }

    function F(t, e, n, r) {
        var i = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : O,
            o = t.handlers[e],
            u = t.options[e];
        if (o || (o = t.handlers[e] = {}, u = t.options[e] = {}), o[n]) throw new Error("".concat(e, " ").concat(n, " already registered"));
        o[n] = r, u[n] = i;
        var a = t.el;
        (e === y ? A(a) : a).addEventListener(n, r, i)
    }

    function N(t, e) {
        var n = t.el,
            r = t.handlers,
            i = t.options,
            o = e === y ? A(n) : n,
            u = r[e],
            a = i[e];
        u && (Object.keys(u).forEach(function(t) {
            var e = a[t];
            "boolean" == typeof e ? o.removeEventListener(t, u[t], e) : o.removeEventListener(t, u[t])
        }), r[e] = null, i[e] = null)
    }

    function M(t) {
        var e = t.el;
        null !== t.pointerId && (e.releasePointerCapture(t.pointerId), t.pointerId = null)
    }

    function I(t, e, n) {
        var r = t.el,
            i = n.target;
        t.trigger(e, {
            type: e,
            sourceEvent: n,
            currentTarget: r,
            target: i
        })
    }

    function L(t, e, n) {
        var r = function(t, e, n) {
            var r, i = e.target,
                o = e.touches,
                u = e.changedTouches,
                a = e.pointerType;
            o || u ? (r = o && o.length ? o[0] : u[0], a = a || "touch") : (r = e, a = a || "mouse");
            var c = r,
                s = c.pageX,
                l = c.pageY;
            return {
                type: t,
                pointerType: a,
                pageX: s,
                pageY: l,
                sourceEvent: e,
                currentTarget: n,
                target: i
            }
        }(e, n, t.el);
        t.trigger(e, r)
    }

    function R(t) {
        return 0 === t.type.indexOf("touch") ? (t.originalEvent || t).changedTouches[0] : t
    }

    function D(t) {
        t.preventDefault && t.preventDefault()
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "b", function() {
        return c
    }), n.d(e, "d", function() {
        return s
    }), n.d(e, "c", function() {
        return l
    }), n.d(e, "a", function() {
        return f
    });
    var r, i = n(18),
        o = [{
            configName: "clearkey",
            keyName: "org.w3.clearkey"
        }, {
            configName: "widevine",
            keyName: "com.widevine.alpha"
        }, {
            configName: "playready",
            keyName: "com.microsoft.playready"
        }],
        u = [],
        a = {};

    function c(t) {
        return t.some(function(t) {
            return !!t.drm || t.sources.some(function(t) {
                return !!t.drm
            })
        })
    }

    function s(t) {
        return r || ((navigator.requestMediaKeySystemAccess && MediaKeySystemAccess.prototype.getConfiguration || window.MSMediaKeys) && Object(i.a)(t)("drm") ? (o.forEach(function(t) {
            var e, n, r = (e = t.keyName, n = [{
                initDataTypes: ["cenc"],
                videoCapabilities: [{
                    contentType: 'video/mp4;codecs="avc1.4d401e"'
                }],
                audioCapabilities: [{
                    contentType: 'audio/mp4;codecs="mp4a.40.2"'
                }]
            }], navigator.requestMediaKeySystemAccess ? navigator.requestMediaKeySystemAccess(e, n) : new Promise(function(t, n) {
                var r;
                try {
                    r = new window.MSMediaKeys(e)
                } catch (t) {
                    return void n(t)
                }
                t(r)
            })).then(function() {
                a[t.configName] = !0
            }).catch(function() {
                a[t.configName] = !1
            });
            u.push(r)
        }), r = Promise.all(u)) : Promise.resolve())
    }

    function l(t) {
        return a[t]
    }

    function f(t) {
        if (r) return Object.keys(t).some(function(t) {
            return l(t)
        })
    }
}, , function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return o
    }), n.d(e, "b", function() {
        return u
    });
    var r = n(10),
        i = null,
        o = {};

    function u() {
        return i || (i = n.e(1).then(function(t) {
            var e = n(20).default;
            return o.controls = e, e
        }.bind(null, n)).catch(function() {
            i = null, Object(r.c)(301130)()
        })), i
    }
}, function(t, e, n) {
    "use strict";
    var r = document.createElement("video");
    e.a = r
}, function(t, e, n) {
    "use strict";
    e.a = {
        advertising: {
            admessage: "This ad will end in xx",
            cuetext: "Advertisement",
            displayHeading: "Advertisement",
            loadingAd: "Loading ad",
            podmessage: "Ad __AD_POD_CURRENT__ of __AD_POD_LENGTH__.",
            skipmessage: "Skip ad in xx",
            skiptext: "Skip"
        },
        airplay: "AirPlay",
        audioTracks: "Audio Tracks",
        auto: "Auto",
        buffer: "Loading",
        cast: "Chromecast",
        cc: "Closed Captions",
        close: "Close",
        errors: {
            badConnection: "This video cannot be played because of a problem with your internet connection.",
            cantLoadPlayer: "Sorry, the video player failed to load.",
            cantPlayInBrowser: "The video cannot be played in this browser.",
            cantPlayVideo: "This video file cannot be played.",
            errorCode: "Error Code",
            liveStreamDown: "The live stream is either down or has ended.",
            protectedContent: "There was a problem providing access to protected content.",
            technicalError: "This video cannot be played because of a technical error."
        },
        exitFullscreen: "Exit Fullscreen",
        fullscreen: "Fullscreen",
        hd: "Quality",
        liveBroadcast: "Live",
        logo: "Logo",
        mute: "Mute",
        next: "Next",
        nextUp: "Next Up",
        notLive: "Not Live",
        off: "Off",
        pause: "Pause",
        play: "Play",
        playback: "Play",
        playbackRates: "Playback Rates",
        player: "Video Player",
        poweredBy: "Powered by",
        prev: "Previous",
        related: {
            autoplaymessage: "Next up in xx",
            heading: "More Videos"
        },
        replay: "Replay",
        rewind: "Rewind 10 Seconds",
        settings: "Settings",
        sharing: {
            copied: "Copied",
            email: "Email",
            embed: "Embed",
            heading: "Share",
            link: "Link"
        },
        slider: "Seek",
        stop: "Stop",
        unmute: "Unmute",
        videoInfo: "About This Video",
        volume: "Volume",
        volumeSlider: "Volume"
    }
}, function(t, e) {
    var n, r, i = {},
        o = {},
        u = (n = function() {
            return document.head || document.getElementsByTagName("head")[0]
        }, function() {
            return void 0 === r && (r = n.apply(this, arguments)), r
        });

    function a(t) {
        var e = document.createElement("style");
        return e.type = "text/css", e.setAttribute("data-jwplayer-id", t),
            function(t) {
                u().appendChild(t)
            }(e), e
    }

    function c(t, e) {
        var n, r, i, u = o[t];
        u || (u = o[t] = {
            element: a(t),
            counter: 0
        });
        var c = u.counter++;
        return n = u.element, i = function() {
                f(n, c, "")
            }, (r = function(t) {
                f(n, c, t)
            })(e.css),
            function(t) {
                if (t) {
                    if (t.css === e.css && t.media === e.media) return;
                    r((e = t).css)
                } else i()
            }
    }
    t.exports = {
        style: function(t, e) {
            ! function(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var r = e[n],
                        o = (i[t] || {})[r.id];
                    if (o) {
                        for (var u = 0; u < o.parts.length; u++) o.parts[u](r.parts[u]);
                        for (; u < r.parts.length; u++) o.parts.push(c(t, r.parts[u]))
                    } else {
                        for (var a = [], u = 0; u < r.parts.length; u++) a.push(c(t, r.parts[u]));
                        i[t] = i[t] || {}, i[t][r.id] = {
                            id: r.id,
                            parts: a
                        }
                    }
                }
            }(e, function(t) {
                for (var e = [], n = {}, r = 0; r < t.length; r++) {
                    var i = t[r],
                        o = i[0],
                        u = i[1],
                        a = i[2],
                        c = {
                            css: u,
                            media: a
                        };
                    n[o] ? n[o].parts.push(c) : e.push(n[o] = {
                        id: o,
                        parts: [c]
                    })
                }
                return e
            }(t))
        },
        clear: function(t, e) {
            var n = i[t];
            if (!n) return;
            if (e) {
                var r = n[e];
                if (r)
                    for (var o = 0; o < r.parts.length; o += 1) r.parts[o]();
                return
            }
            for (var u = Object.keys(n), a = 0; a < u.length; a += 1)
                for (var c = n[u[a]], s = 0; s < c.parts.length; s += 1) c.parts[s]();
            delete i[t]
        }
    };
    var s, l = (s = [], function(t, e) {
        return s[t] = e, s.filter(Boolean).join("\n")
    });

    function f(t, e, n) {
        if (t.styleSheet) t.styleSheet.cssText = l(e, n);
        else {
            var r = document.createTextNode(n),
                i = t.childNodes[e];
            i ? t.replaceChild(r, i) : t.appendChild(r)
        }
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(15),
        o = n(16),
        u = n(33),
        a = n(10);

    function c(t) {
        this.config = t || {}
    }
    var s = {
        html5: function() {
            return n.e(14).then(function(t) {
                var e = n(50).default;
                return Object(o.a)(e), e
            }.bind(null, n)).catch(Object(a.b)(152))
        }
    };
    Object(r.j)(c.prototype, {
        load: function(t) {
            var e = s[t],
                n = function() {
                    return Promise.reject(new Error("Failed to load media"))
                };
            return e ? e().then(function() {
                var e = u.a[t];
                return e || n()
            }) : n()
        },
        providerSupports: function(t, e) {
            return t.supports(e)
        },
        choose: function(t) {
            if (t === Object(t))
                for (var e = i.a.length, n = 0; n < e; n++) {
                    var r = i.a[n];
                    if (this.providerSupports(r, t)) return {
                        priority: e - n - 1,
                        name: r.name,
                        type: t.type,
                        providerToCheck: r,
                        provider: u.a[r.name]
                    }
                }
            return {}
        }
    });
    var l, f = c;
    Object(r.j)(s, {
        shaka: function() {
            return n.e(15).then(function(t) {
                var e = n(149).default;
                return Object(o.a)(e), e
            }.bind(null, n)).catch(Object(a.b)(154))
        },
        hlsjs: function() {
            return n.e(13).then(function(t) {
                var e = n(148).default;
                return e.setEdition && e.setEdition(l), Object(o.a)(e), e
            }.bind(null, n)).catch(Object(a.b)(153))
        },
        flash: function() {
            return n.e(12).then(function(t) {
                var e = n(151).default;
                return Object(o.a)(e), e
            }.bind(null, n)).catch(Object(a.b)(151))
        }
    }), f.prototype.providerSupports = function(t, e) {
        return l = this.config.edition, t.supports(e, l)
    };
    e.a = f
}, function(t, e, n) {
    "use strict";
    var r = function(t, e, n, r) {
            var i = r ? "(".concat(n, ": ").concat(r, ")").replace(/\s+/g, "&nbsp;") : "";
            return '<div id="'.concat(t, '" class="jw-error jw-reset">') + '<div class="jw-error-msg jw-info-overlay jw-reset"><style>' + '[id="'.concat(t, '"].jw-error{background:#000;overflow:hidden;position:relative}') + '[id="'.concat(t, '"] .jw-error-msg{top:50%;left:50%;position:absolute;transform:translate(-50%,-50%)}') + '[id="'.concat(t, '"] .jw-error-text{text-align:start;color:#FFF;font:14px/1.35 Arial,Helvetica,sans-serif}') + '</style><div class="jw-icon jw-reset"></div><div class="jw-info-container jw-reset">' + '<div class="jw-error-text jw-reset-text" dir="auto">'.concat(e || "", '<span class="jw-break jw-reset"></span>').concat(i, "</div>") + "</div></div></div>"
        },
        i = n(9),
        o = n(23);

    function u(t, e) {
        var n = e.message,
            u = e.code,
            a = r(t.get("id"), n, t.get("localization").errors.errorCode, u),
            c = t.get("width"),
            s = t.get("height"),
            l = Object(i.e)(a);
        return Object(o.d)(l, {
            width: c.toString().indexOf("%") > 0 ? c : "".concat(c, "px"),
            height: s.toString().indexOf("%") > 0 ? s : "".concat(s, "px")
        }), l
    }
    n.d(e, "a", function() {
        return u
    })
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return r
    });
    var r = window.atob
}, function(t, e, n) {
    "use strict";
    var r = n(4),
        i = n(2);

    function o(t) {
        for (var e = [], n = 0; n < Object(r.c)(t); n++) {
            var i = t.childNodes[n];
            "jwplayer" === i.prefix && "mediatypes" === Object(r.b)(i).toLowerCase() && e.push(Object(r.d)(i))
        }
        return e
    }
    var u = function t(e, n) {
            var u, a, c = [];
            for (var s = 0; s < Object(r.c)(e); s++) {
                var l = e.childNodes[s];
                if ("media" === l.prefix) {
                    if (!Object(r.b)(l)) continue;
                    switch (Object(r.b)(l).toLowerCase()) {
                        case "content":
                            if (Object(i.i)(l, "duration") && (n.duration = Object(i.f)(Object(i.i)(l, "duration"))), Object(i.i)(l, "url")) {
                                n.sources || (n.sources = []);
                                var f = {
                                        file: Object(i.i)(l, "url"),
                                        type: Object(i.i)(l, "type"),
                                        width: Object(i.i)(l, "width"),
                                        label: Object(i.i)(l, "label")
                                    },
                                    d = o(l);
                                d.length && (f.mediaTypes = d), n.sources.push(f)
                            }
                            Object(r.c)(l) > 0 && (n = t(l, n));
                            break;
                        case "title":
                            n.title = Object(r.d)(l);
                            break;
                        case "description":
                            n.description = Object(r.d)(l);
                            break;
                        case "guid":
                            n.mediaid = Object(r.d)(l);
                            break;
                        case "thumbnail":
                            n.image || (n.image = Object(i.i)(l, "url"));
                            break;
                        case "group":
                            t(l, n);
                            break;
                        case "subtitle":
                            var p = {};
                            p.file = Object(i.i)(l, "url"), p.kind = "captions", Object(i.i)(l, "lang").length > 0 && (p.label = (u = Object(i.i)(l, "lang"), a = void 0, (a = {
                                zh: "Chinese",
                                nl: "Dutch",
                                en: "English",
                                fr: "French",
                                de: "German",
                                it: "Italian",
                                ja: "Japanese",
                                pt: "Portuguese",
                                ru: "Russian",
                                es: "Spanish"
                            })[u] ? a[u] : u)), c.push(p)
                    }
                }
            }
            n.hasOwnProperty("tracks") || (n.tracks = []);
            for (var h = 0; h < c.length; h++) n.tracks.push(c[h]);
            return n
        },
        a = n(11),
        c = function(t, e) {
            for (var n = "default", o = [], u = [], c = 0; c < t.childNodes.length; c++) {
                var s = t.childNodes[c];
                if ("jwplayer" === s.prefix) {
                    var l = Object(r.b)(s);
                    "source" === l ? (delete e.sources, o.push({
                        file: Object(i.i)(s, "file"),
                        default: Object(i.i)(s, n),
                        label: Object(i.i)(s, "label"),
                        type: Object(i.i)(s, "type")
                    })) : "track" === l ? (delete e.tracks, u.push({
                        file: Object(i.i)(s, "file"),
                        default: Object(i.i)(s, n),
                        kind: Object(i.i)(s, "kind"),
                        label: Object(i.i)(s, "label")
                    })) : (e[l] = Object(a.serialize)(Object(r.d)(s)), "file" === l && e.sources && delete e.sources)
                }
                e.file || (e.file = e.link)
            }
            if (o.length) {
                e.sources = [];
                for (var f = 0; f < o.length; f++) o[f].file.length > 0 && (o[f][n] = "true" === o[f][n], o[f].label.length || delete o[f].label, e.sources.push(o[f]))
            }
            if (u.length) {
                e.tracks = [];
                for (var d = 0; d < u.length; d++) u[d].file.length > 0 && (u[d][n] = "true" === u[d][n], u[d].kind = u[d].kind.length ? u[d].kind : "captions", u[d].label.length || delete u[d].label, e.tracks.push(u[d]))
            }
            return e
        },
        s = n(28);

    function l(t) {
        var e = [];
        e.feedData = {};
        for (var n = 0; n < Object(r.c)(t); n++) {
            var i = Object(r.a)(t, n);
            if ("channel" === Object(r.b)(i).toLowerCase())
                for (var o = 0; o < Object(r.c)(i); o++) {
                    var u = Object(r.a)(i, o),
                        a = Object(r.b)(u).toLowerCase();
                    "item" === a ? e.push(f(u)) : a && (e.feedData[a] = Object(r.d)(u))
                }
        }
        return e
    }

    function f(t) {
        for (var e = {}, n = 0; n < t.childNodes.length; n++) {
            var o = t.childNodes[n],
                a = Object(r.b)(o);
            if (a) switch (a.toLowerCase()) {
                case "enclosure":
                    e.file = Object(i.i)(o, "url");
                    break;
                case "title":
                    e.title = Object(r.d)(o);
                    break;
                case "guid":
                    e.mediaid = Object(r.d)(o);
                    break;
                case "pubdate":
                    e.date = Object(r.d)(o);
                    break;
                case "description":
                    e.description = Object(r.d)(o);
                    break;
                case "link":
                    e.link = Object(r.d)(o);
                    break;
                case "category":
                    e.tags ? e.tags += Object(r.d)(o) : e.tags = Object(r.d)(o)
            }
        }
        return new s.a(c(t, u(t, e)))
    }
    n.d(e, "a", function() {
        return l
    })
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(24),
        o = n(11),
        u = n(2),
        a = n(1),
        c = n(12),
        s = 0,
        l = 1,
        f = function(t) {
            if ("string" == typeof t) {
                var e = (t = t.split("?")[0]).indexOf("://");
                if (e > 0) return s;
                var n = t.indexOf("/"),
                    r = Object(u.a)(t);
                return !(e < 0 && n < 0) || r && isNaN(r) ? l : 2
            }
        };
    var d = function(t) {
        this.url = t, this.promise_ = null
    };
    Object.defineProperties(d.prototype, {
        promise: {
            get: function() {
                return this.promise_ || this.load()
            },
            set: function() {}
        }
    }), Object(r.j)(d.prototype, {
        load: function() {
            var t = this,
                e = this.promise_;
            if (!e) {
                if (2 === f(this.url)) e = Promise.resolve(this);
                else {
                    var n = new i.a(function(t) {
                        switch (f(t)) {
                            case s:
                                return t;
                            case l:
                                return Object(o.getAbsolutePath)(t, window.location.href)
                        }
                    }(this.url));
                    this.loader = n, e = n.load().then(function() {
                        return t
                    })
                }
                this.promise_ = e
            }
            return e
        },
        registerPlugin: function(t, e, n) {
            this.name = t, this.target = e, this.js = n
        },
        getNewInstance: function(t, e, n) {
            var r = this.js;
            if ("function" != typeof r) throw new a.s(null, Object(c.c)(this.url) + 100);
            var i = new r(t, e, n);
            return i.addToPlayer = function() {
                var e = t.getContainer().querySelector(".jw-overlays");
                e && (n.left = e.style.left, n.top = e.style.top, e.appendChild(n), i.displayArea = e)
            }, i.resizeHandler = function() {
                var t = i.displayArea;
                t && i.resize(t.clientWidth, t.clientHeight)
            }, i
        }
    }), e.a = d
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return r
    });
    var r = "function" == typeof console.log ? console.log.bind(console) : function() {}
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return o
    });
    var r = n(44);

    function i(t) {
        for (var e = new Array(Math.ceil(t.length / 4)), n = 0; n < e.length; n++) e[n] = t.charCodeAt(4 * n) + (t.charCodeAt(4 * n + 1) << 8) + (t.charCodeAt(4 * n + 2) << 16) + (t.charCodeAt(4 * n + 3) << 24);
        return e
    }

    function o(t, e) {
        if (t = String(t), e = String(e), 0 === t.length) return "";
        for (var n, o, u, a = i(Object(r.a)(t)), c = i((n = e, unescape(encodeURIComponent(n))).slice(0, 16)), s = a.length, l = a[s - 1], f = a[0], d = 2654435769 * Math.floor(6 + 52 / s); d;) {
            u = d >>> 2 & 3;
            for (var p = s - 1; p >= 0; p--) o = ((l = a[p > 0 ? p - 1 : s - 1]) >>> 5 ^ f << 2) + (f >>> 3 ^ l << 4) ^ (d ^ f) + (c[3 & p ^ u] ^ l), f = a[p] -= o;
            d -= 2654435769
        }
        return function(t) {
            try {
                return decodeURIComponent(escape(t))
            } catch (e) {
                return t
            }
        }(function(t) {
            for (var e = new Array(t.length), n = 0; n < t.length; n++) e[n] = String.fromCharCode(255 & t[n], t[n] >>> 8 & 255, t[n] >>> 16 & 255, t[n] >>> 24 & 255);
            return e.join("")
        }(a).replace(/\0+$/, ""))
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "b", function() {
        return r
    }), n.d(e, "a", function() {
        return i
    });
    var r = {
            audioMode: !1,
            flashBlocked: !1,
            item: 0,
            itemMeta: {},
            playbackRate: 1,
            playRejected: !1,
            state: n(3).nb,
            itemReady: !1,
            controlsEnabled: !1
        },
        i = {
            position: 0,
            duration: 0,
            buffer: 0,
            currentTime: 0
        }
}, , function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return r
    });
    var r = function(t, e, n) {
        return Math.max(Math.min(t, n), e)
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return s
    });
    var r = n(8);

    function i(t) {
        return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
            return typeof t
        } : function(t) {
            return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
        })(t)
    }

    function o(t, e) {
        for (var n = 0; n < e.length; n++) {
            var r = e[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(t, r.key, r)
        }
    }

    function u(t, e) {
        return !e || "object" !== i(e) && "function" != typeof e ? function(t) {
            if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return t
        }(t) : e
    }

    function a(t) {
        return (a = Object.setPrototypeOf ? Object.getPrototypeOf : function(t) {
            return t.__proto__ || Object.getPrototypeOf(t)
        })(t)
    }

    function c(t, e) {
        return (c = Object.setPrototypeOf || function(t, e) {
            return t.__proto__ = e, t
        })(t, e)
    }
    var s = function(t) {
        function e() {
            var t;
            return function(t, e) {
                if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
            }(this, e), (t = u(this, a(e).call(this))).attributes = Object.create(null), t
        }
        var n, i, s;
        return function(t, e) {
            if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
            t.prototype = Object.create(e && e.prototype, {
                constructor: {
                    value: t,
                    writable: !0,
                    configurable: !0
                }
            }), e && c(t, e)
        }(e, r["a"]), n = e, (i = [{
            key: "addAttributes",
            value: function(t) {
                var e = this;
                Object.keys(t).forEach(function(n) {
                    e.add(n, t[n])
                })
            }
        }, {
            key: "add",
            value: function(t, e) {
                var n = this;
                Object.defineProperty(this, t, {
                    get: function() {
                        return n.attributes[t]
                    },
                    set: function(e) {
                        return n.set(t, e)
                    },
                    enumerable: !1
                }), this.attributes[t] = e
            }
        }, {
            key: "get",
            value: function(t) {
                return this.attributes[t]
            }
        }, {
            key: "set",
            value: function(t, e) {
                if (this.attributes[t] !== e) {
                    var n = this.attributes[t];
                    this.attributes[t] = e, this.trigger("change:" + t, this, e, n)
                }
            }
        }, {
            key: "clone",
            value: function() {
                var t = {},
                    e = this.attributes;
                if (e)
                    for (var n in e) t[n] = e[n];
                return t
            }
        }, {
            key: "change",
            value: function(t, e, n) {
                this.on("change:" + t, e, n);
                var r = this.get(t);
                return e.call(n, this, r, r), this
            }
        }]) && o(n.prototype, i), s && o(n, s), e
    }()
}, function(t, e, n) {
    "use strict";

    function r(t, e, n) {
        var r = [],
            i = {};

        function o() {
            for (; r.length > 0;) {
                var e = r.shift(),
                    n = e.command,
                    o = e.args;
                (i[n] || t[n]).apply(t, o)
            }
        }
        e.forEach(function(e) {
            var u = t[e];
            i[e] = u, t[e] = function() {
                var t = Array.prototype.slice.call(arguments, 0);
                n() ? r.push({
                    command: e,
                    args: t
                }) : (o(), u && u.apply(this, t))
            }
        }), Object.defineProperty(this, "queue", {
            enumerable: !0,
            get: function() {
                return r
            }
        }), this.flush = o, this.empty = function() {
            r.length = 0
        }, this.off = function() {
            e.forEach(function(e) {
                var n = i[e];
                n && (t[e] = n, delete i[e])
            })
        }, this.destroy = function() {
            this.off(), this.empty()
        }
    }
    n.d(e, "a", function() {
        return r
    })
}, function(t, e, n) {
    "use strict";
    n.d(e, "c", function() {
        return r
    }), n.d(e, "b", function() {
        return i
    }), n.d(e, "a", function() {
        return o
    });
    var r = 4,
        i = 2,
        o = 1
}, function(t, e, n) {
    "use strict";
    var r = n(3),
        i = function() {},
        o = function() {
            return !1
        },
        u = {
            name: "default"
        },
        a = {
            supports: o,
            play: i,
            pause: i,
            preload: i,
            load: i,
            stop: i,
            volume: i,
            mute: i,
            seek: i,
            resize: i,
            remove: i,
            destroy: i,
            eventsOn_: i,
            eventsOff_: i,
            setVisibility: i,
            setFullscreen: i,
            getFullscreen: o,
            supportsFullscreen: o,
            getContainer: i,
            setContainer: i,
            getName: function() {
                return u
            },
            getQualityLevels: i,
            getCurrentQuality: i,
            setCurrentQuality: i,
            getAudioTracks: i,
            getCurrentAudioTrack: i,
            setCurrentAudioTrack: i,
            getSeekRange: function() {
                return {
                    start: 0,
                    end: this.getDuration()
                }
            },
            setPlaybackRate: i,
            getPlaybackRate: function() {
                return 1
            },
            getBandwidthEstimate: function() {
                return null
            },
            setControls: i,
            attachMedia: i,
            detachMedia: i,
            init: i,
            setState: function(t) {
                this.state = t, this.trigger(r.bb, {
                    newstate: t
                })
            },
            sendMediaType: function(t) {
                var e = t[0],
                    n = e.type,
                    i = e.mimeType,
                    o = "aac" === n || "mp3" === n || "mpeg" === n || i && 0 === i.indexOf("audio/");
                this.trigger(r.T, {
                    mediaType: o ? "audio" : "video"
                })
            }
        };
    e.a = a
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(3),
        o = n(4),
        u = n(45),
        a = n(27),
        c = n(8),
        s = n(1);
    e.a = function() {
        var t = Object(r.j)(this, c.a);

        function e(e) {
            try {
                var a, c = e.responseXML ? e.responseXML.childNodes : null,
                    l = "";
                if (c) {
                    for (var f = 0; f < c.length && 8 === (l = c[f]).nodeType; f++);
                    if ("xml" === Object(o.b)(l) && (l = l.nextSibling), "rss" === Object(o.b)(l)) {
                        var d = Object(u.a)(l);
                        a = Object(r.j)({
                            playlist: d
                        }, d.feedData)
                    }
                }
                if (!a) try {
                    var p = JSON.parse(e.responseText);
                    if (Array.isArray(p)) a = {
                        playlist: p
                    };
                    else {
                        if (!Array.isArray(p.playlist)) throw Error("Playlist is not an array");
                        a = p
                    }
                } catch (t) {
                    throw new s.s(s.o, 621, t)
                }
                t.trigger(i.eb, a)
            } catch (t) {
                n(t)
            }
        }

        function n(e) {
            e.code || (e = new s.s(s.o, 0)), t.trigger(i.w, e)
        }
        this.load = function(t) {
            Object(a.a)(t, e, function(t, e, r, i) {
                n(i)
            })
        }, this.destroy = function() {
            this.off()
        }
    }
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return i
    });
    var r = n(0);

    function i(t, e) {
        return Object(r.j)({}, e, {
            prime: function() {
                t.src || t.load()
            },
            getPrimedElement: function() {
                return t
            },
            clean: function() {
                e.clean(t)
            },
            recycle: function() {
                e.clean(t)
            }
        })
    }
}, function(t, e, n) {
    "use strict";
    var r = n(0),
        i = n(53),
        o = n(19),
        u = n(11),
        a = n(6),
        c = n(40),
        s = n(13),
        l = {
            autoPause: {
                viewability: !1
            },
            autostart: !1,
            bandwidthEstimate: null,
            bitrateSelection: null,
            castAvailable: !1,
            controls: !0,
            cues: [],
            defaultPlaybackRate: 1,
            displaydescription: !0,
            displaytitle: !0,
            displayPlaybackLabel: !1,
            height: 360,
            intl: {},
            language: "en",
            liveTimeout: null,
            localization: c.a,
            mute: !1,
            nextUpDisplay: !0,
            playbackRateControls: !1,
            playbackRates: [.5, 1, 1.25, 1.5, 2],
            renderCaptionsNatively: !1,
            repeat: !1,
            stretching: "uniform",
            volume: 90,
            width: 640
        };

    function f(t) {
        return t.slice && "px" === t.slice(-2) && (t = t.slice(0, -2)), t
    }
    var d = function(t, e) {
            var i = Object(r.j)({}, (window.jwplayer || {}).defaults, e, t);
            ! function(t) {
                Object.keys(t).forEach(function(e) {
                    "id" !== e && (t[e] = Object(u.serialize)(t[e]))
                })
            }(i);
            var d = i.forceLocalizationDefaults ? l.language : Object(s.e)(),
                p = Object(s.j)(i.intl);
            i.localization = Object(s.a)(c.a, Object(s.c)(i, p, d));
            var h = Object(r.j)({}, l, i);
            "." === h.base && (h.base = Object(o.getScriptPath)("jwplayer.js")), h.base = (h.base || Object(o.loadFrom)()).replace(/\/?$/, "/"), n.p = h.base, h.width = f(h.width), h.height = f(h.height), h.aspectratio = function(t, e) {
                if (-1 === e.toString().indexOf("%")) return 0;
                if ("string" != typeof t || !t) return 0;
                if (/^\d*\.?\d+%$/.test(t)) return t;
                var n = t.indexOf(":");
                if (-1 === n) return 0;
                var r = parseFloat(t.substr(0, n)),
                    i = parseFloat(t.substr(n + 1));
                return r <= 0 || i <= 0 ? 0 : i / r * 100 + "%"
            }(h.aspectratio, h.width), h.volume = Object(r.z)(h.volume) ? Math.min(Math.max(0, h.volume), 100) : l.volume, h.mute = !!h.mute, h.language = d, h.intl = p;
            var v = i.autoPause;
            v && (h.autoPause.viewability = !("viewability" in v && !v.viewability));
            var g = h.playbackRateControls;
            if (g) {
                var b = h.playbackRates;
                Array.isArray(g) && (b = g), (b = b.filter(function(t) {
                    return Object(r.v)(t) && t >= .25 && t <= 4
                }).map(function(t) {
                    return Math.round(100 * t) / 100
                })).indexOf(1) < 0 && b.push(1), b.sort(), h.playbackRateControls = !0, h.playbackRates = b
            }(!h.playbackRateControls || h.playbackRates.indexOf(h.defaultPlaybackRate) < 0) && (h.defaultPlaybackRate = 1), h.playbackRate = h.defaultPlaybackRate, h.aspectratio || delete h.aspectratio;
            var m = h.playlist;
            if (m) Array.isArray(m.playlist) && (h.feedData = m, h.playlist = m.playlist);
            else {
                var y = Object(r.D)(h, ["title", "description", "type", "mediaid", "image", "file", "sources", "tracks", "preload", "duration"]);
                h.playlist = [y]
            }
            h.qualityLabels = h.qualityLabels || h.hlslabels, delete h.duration;
            var j = h.liveTimeout;
            null !== j && (Object(r.z)(j) ? 0 !== j && (j = Math.max(30, j)) : j = null, h.liveTimeout = j);
            var w, O, k = parseFloat(h.bandwidthEstimate),
                C = parseFloat(h.bitrateSelection);
            return h.bandwidthEstimate = Object(r.z)(k) ? k : (w = h.defaultBandwidthEstimate, O = parseFloat(w), Object(r.z)(O) ? Math.max(O, 1) : l.bandwidthEstimate), h.bitrateSelection = Object(r.z)(C) ? C : l.bitrateSelection, h.backgroundLoading = Object(r.r)(h.backgroundLoading) ? h.backgroundLoading : a.Features.backgroundLoading, h
        },
        p = n(26),
        h = n(7),
        v = n(18),
        g = "__CONTEXTUAL__";

    function b(t, e) {
        var n = t.querySelector(e);
        if (n) return n.getAttribute("content")
    }

    function m(t) {
        return "string" == typeof t && /^\/\/(?:content\.jwplatform|cdn\.jwplayer)\.com\//.test(t)
    }

    function y(t) {
        return "https:" + t
    }

    function j(t) {
        var e = "file:" === window.location.protocol ? "https:" : "",
            n = {
                jwpsrv: "playergk/jwplayer885/js/v/8.8.5/js/jwpsrv.js",
                dai: "playergk/jwplayer885/js/v/8.8.5/js/dai.js",
                vast: "playergk/jwplayer885/js/v/8.8.5/js/vast.js",
                googima: "playergk/jwplayer885/js/v/8.8.5/js/googima.js",
                freewheel: "playergk/jwplayer885/js/v/8.8.5/js/freewheel.js",
                gapro: "playergk/jwplayer885/js/v/8.8.5/js/gapro.js"
            }[t];
        return n ? e + n : ""
    }

    function w(t, e, n) {
        e && (t[e.client || j(n)] = e, delete e.client)
    }
    var O = function(t, e) {
            var i, u = d(t, e),
                a = u.key || window.jwplayer && window.jwplayer.key,
                c = new p.b(a),
                s = c.edition();
            if (u.key = a, u.edition = s, u.error = c.error(), "unlimited" === s) {
                var l = Object(o.getScriptPath)("jwplayer.js");
                if (!l) throw new Error("Error setting up player: Could not locate jwplayer.js script tag");
                n.p = l
            }
            if (u.flashplayer = function(t) {
                    var e = t.flashplayer;
                    return e || (e = (Object(o.getScriptPath)("jwplayer.js") || t.base) + "jwplayer.flash.swf"), "http:" === window.location.protocol && (e = e.replace(/^https/, "http")), e
                }(u), u.plugins = function(t) {
                    var e = Object(r.j)({}, t.plugins),
                        n = t.edition,
                        i = Object(v.a)(n);
                    if (i("ads")) {
                        var o = Object(r.j)({}, t.advertising),
                            u = o.client;
                        if (u) {
                            var a = j(u) || u;
                            e[a] = o, delete o.client
                        }
                    }
                    if (i("jwpsrv")) {
                        var c = t.analytics;
                        c !== Object(c) && (c = {}), w(e, c, "jwpsrv")
                    }
                    return w(e, t.ga, "gapro"), e
                }(u), u.ab && (u.ab = function(t) {
                    var e = t.ab;
                    return e.clone && (e = e.clone()), Object.keys(e.tests).forEach(function(n) {
                        e.tests[n].forEach(function(e) {
                            e.addConfig && e.addConfig(t, e.selection)
                        })
                    }), e
                }(u)), i = u.playlist, Object(r.x)(i) && i.indexOf(g) > -1 && (u.playlist = function(t, e) {
                    var n = (t.querySelector("title") || {}).textContent,
                        r = b(t, 'meta[property="og:title"]'),
                        i = encodeURIComponent(r || n || ""),
                        o = b(t, 'meta[property="og:description"]') || b(t, 'meta[name="description"]');
                    return o && (i += "&page_description=" + encodeURIComponent(o)), e.replace(g, i)
                }(document, u.playlist), u.contextual = !0), Object(h.isFileProtocol)()) {
                var f = u.playlist,
                    O = u.related;
                m(f) && (u.playlist = y(f)), O && m(O.file) && (O.file = y(O.file))
            }
            return u
        },
        k = n(10),
        C = n(25),
        P = n(3),
        x = n(56),
        S = n(29),
        T = n(24),
        E = n(1);

    function _(t) {
        var e = t.get("playlist");
        return new Promise(function(n, r) {
            if ("string" != typeof e) {
                var i = t.get("feedData") || {};
                return A(t, e, i), n()
            }
            var o = new x.a;
            o.on(P.eb, function(e) {
                var r = e.playlist;
                delete e.playlist, A(t, r, e), n()
            }), o.on(P.w, function(e) {
                A(t, [], {}), r(Object(E.z)(e, E.u))
            }), o.load(e)
        })
    }

    function A(t, e, n) {
        var r = t.attributes;
        r.playlist = Object(S.a)(e), r.feedData = n
    }

    function F(t) {
        return t.attributes._destroyed
    }
    var N = n(36),
        M = n(46),
        I = n(12),
        L = 301129;

    function R(t) {
        return z(t) ? Promise.resolve() : _(t).then(function() {
            if (t.get("drm") || Object(N.b)(t.get("playlist"))) return Object(N.d)(t.get("edition"))
        }).then(function() {
            return _(e = t).then(function() {
                if (!F(e)) {
                    var t = Object(S.b)(e.get("playlist"), e);
                    e.attributes.playlist = t;
                    try {
                        Object(S.e)(t)
                    } catch (t) {
                        throw t.code += E.u, t
                    }
                    var n = e.getProviders(),
                        r = n.choose(t[0].sources[0]),
                        i = r.provider,
                        o = r.name;
                    return "function" == typeof i ? i : k.a.html5 && "html5" === o ? k.a.html5 : n.load(o).catch(function(t) {
                        throw Object(E.z)(t, E.v)
                    })
                }
            });
            var e
        })
    }

    function D(t, e) {
        var r = [B(t)];
        return z(t) || r.push(function(t, e) {
            var r = t.get("related"),
                i = Object(v.a)(t.get("edition")),
                o = r === Object(r) && i("discovery");
            if (!1 !== t.get("controls") || o) {
                var u = !1 !== t.get("visualplaylist") || o;
                return o || (r = {
                    disableRelated: !0
                }), r.showButton = u, n.e(16).then(function(i) {
                    if (!t.attributes._destroyed) {
                        var o = new M.a;
                        o.name = "related", o.js = n(147).default, Object(I.a)(o, r, e)
                    }
                }.bind(null, n)).catch(Object(k.b)(L)).catch(function(t) {
                    return t
                })
            }
            return Promise.resolve()
        }(t, e), Promise.resolve()), Promise.all(r)
    }

    function B(t) {
        var e = t.attributes,
            n = e.error;
        if (n && n.code === p.a) {
            var r = e.pid,
                i = e.ph,
                o = new p.b(e.key);
            if (i > 0 && i < 4 && r && o.duration() > -7776e6) return new T.a("//content.jwplatform.com/libraries/".concat(r, ".js")).load().then(function() {
                var t = window.jwplayer.defaults.key,
                    n = new p.b(t);
                n.error() || n.token() !== o.token() || (e.key = t, e.edition = n.edition(), e.error = n.error())
            }).catch(function() {})
        }
        return Promise.resolve()
    }

    function z(t) {
        var e = t.get("advertising");
        return !(!e || !e.outstream)
    }
    var q = function(t) {
            var e = t.get("skin") ? t.get("skin").url : void 0;
            if ("string" == typeof e && ! function(t) {
                    for (var e = document.styleSheets, n = 0, r = e.length; n < r; n++)
                        if (e[n].href === t) return !0;
                    return !1
                }(e)) return new T.a(e, !0).load().catch(function(t) {
                return t
            });
            return Promise.resolve()
        },
        V = function(t) {
            var e = t.attributes,
                n = e.language,
                r = e.base,
                i = e.setupConfig,
                o = e.intl,
                u = Object(s.c)(i, o, n);
            return !Object(s.h)(n) || Object(s.f)(u) ? Promise.resolve() : new Promise(function(i) {
                return Object(s.i)(r, n).then(function(n) {
                    var r = n.response;
                    if (!F(t)) {
                        if (!r) throw new E.s(null, E.g);
                        e.localization = Object(s.a)(r, u), i()
                    }
                }).catch(function(t) {
                    i(t.code === E.g ? t : Object(E.z)(t, E.f))
                })
            })
        };
    var Q = function(t) {
            var e;
            this.start = function(n) {
                var r = Object(C.a)(t, n),
                    i = Promise.all([Object(k.d)(t), r, R(t), D(t, n), q(t), V(t)]),
                    o = new Promise(function(t, n) {
                        e = setTimeout(function() {
                            n(new E.s(E.m, E.x))
                        }, 6e4);
                        var r = function() {
                            clearTimeout(e), setTimeout(t, 6e4)
                        };
                        i.then(r).catch(r)
                    });
                return Promise.race([i, o]).catch(function(t) {
                    var e = function() {
                        throw t
                    };
                    return r.then(e).catch(e)
                }).then(function(t) {
                    return function(t) {
                        if (!t || !t.length) return {
                            core: null,
                            warnings: []
                        };
                        var e = t.reduce(function(t, e) {
                            return t.concat(e)
                        }, []).filter(function(t) {
                            return t && t.code
                        });
                        return {
                            core: t[0],
                            warnings: e
                        }
                    }(t)
                })
            }, this.destroy = function() {
                clearTimeout(e), t.set("_destroyed", !0), t = null
            }
        },
        X = n(42),
        W = n(31),
        U = n(22),
        H = {
            removeItem: function() {}
        };
    try {
        H = window.localStorage || H
    } catch (t) {}

    function Y(t, e) {
        this.namespace = t, this.items = e
    }
    Object(r.j)(Y.prototype, {
        getAllItems: function() {
            var t = this;
            return this.items.reduce(function(e, n) {
                var r = H["".concat(t.namespace, ".").concat(n)];
                return r && (e[n] = Object(u.serialize)(r)), e
            }, {})
        },
        track: function(t) {
            var e = this;
            this.items.forEach(function(n) {
                t.on("change:".concat(n), function(t, r) {
                    try {
                        H["".concat(e.namespace, ".").concat(n)] = r
                    } catch (t) {
                        U.a.debug && console.error(t)
                    }
                })
            })
        },
        clear: function() {
            var t = this;
            this.items.forEach(function(e) {
                H.removeItem("".concat(t.namespace, ".").concat(e))
            })
        }
    });
    var J = Y,
        K = n(52),
        $ = n(49),
        G = n(8),
        Z = n(43),
        tt = n(54);

    function et(t) {
        t.src || t.load()
    }

    function nt() {
        var t = document.createElement("video");
        return t.className = "jw-video jw-reset", t.setAttribute("tabindex", "-1"), t.setAttribute("disableRemotePlayback", ""), t.setAttribute("webkit-playsinline", ""), t.setAttribute("playsinline", ""), t
    }
    var rt = n(57),
        it = n(35);
    n.d(e, "b", function() {
        return ct
    });
    var ot = function(t) {
        this._events = {}, this.modelShim = new K.a, this.modelShim._qoeItem = new W.a, this.mediaShim = {}, this.setup = new Q(this.modelShim), this.currentContainer = this.originalContainer = t, this.apiQueue = new i.a(this, ["load", "play", "pause", "seek", "stop", "playlistItem", "playlistNext", "playlistPrev", "next", "preload", "setConfig", "setCurrentAudioTrack", "setCurrentCaptions", "setCurrentQuality", "setFullscreen", "addButton", "removeButton", "castToggle", "setMute", "setVolume", "setPlaybackRate", "addCues", "setCues", "setPlaylistItem", "resize", "setCaptions", "setControls"], function() {
            return !0
        })
    };

    function ut(t, e) {
        e && e.code && (e.sourceError && console.error(e.sourceError), console.error(E.s.logMessage(e.code)))
    }

    function at(t) {
        t && t.code && console.warn(E.s.logMessage(t.code))
    }

    function ct(t, e) {
        if (!document.body.contains(t.currentContainer)) {
            var n = document.getElementById(t.get("id"));
            n && (t.currentContainer = n)
        }
        t.currentContainer.parentElement && t.currentContainer.parentElement.replaceChild(e, t.currentContainer), t.currentContainer = e
    }
    Object(r.j)(ot.prototype, {
        on: G.a.on,
        once: G.a.once,
        off: G.a.off,
        trigger: G.a.trigger,
        init: function(t, e) {
            var n = this,
                i = this.modelShim,
                o = new J("jwplayer", ["volume", "mute", "captionLabel", "bandwidthEstimate", "bitrateSelection", "qualityLabel"]),
                u = o && o.getAllItems();
            i.attributes = i.attributes || {}, Object(r.j)(this.mediaShim, $.a);
            var a = t,
                c = O(Object(r.j)({}, t), u);
            c.id = e.id, c.setupConfig = a, Object(r.j)(i.attributes, c, $.b), i.getProviders = function() {
                return new X.a(c)
            }, i.setProvider = function() {};
            var s = function() {
                for (var t = tt.c, e = [], n = [], r = 0; r < t; r++) {
                    var i = nt();
                    e.push(i), n.push(i), et(i)
                }
                var o = n.shift(),
                    u = n.shift(),
                    a = !1;
                return {
                    primed: function() {
                        return a
                    },
                    prime: function() {
                        e.forEach(et), a = !0
                    },
                    played: function() {
                        a = !0
                    },
                    getPrimedElement: function() {
                        return n.length ? n.shift() : null
                    },
                    getAdElement: function() {
                        return o
                    },
                    getTestElement: function() {
                        return u
                    },
                    clean: function(t) {
                        if (t.src) {
                            t.removeAttribute("src");
                            try {
                                t.load()
                            } catch (t) {}
                        }
                    },
                    recycle: function(t) {
                        t && !n.some(function(e) {
                            return e === t
                        }) && (this.clean(t), n.push(t))
                    },
                    syncVolume: function(t) {
                        var n = Math.min(Math.max(0, t / 100), 1);
                        e.forEach(function(t) {
                            t.volume = n
                        })
                    },
                    syncMute: function(t) {
                        e.forEach(function(e) {
                            e.muted = t
                        })
                    }
                }
            }();
            i.get("backgroundLoading") || (s = Object(rt.a)(s.getPrimedElement(), s));
            var l = new it.a(Object(it.b)(this.originalContainer)).once("gesture", function() {
                s.prime(), n.preload(), l.destroy()
            });
            return i.on("change:errorEvent", ut), this.setup.start(e).then(function(t) {
                var u = t.core;
                if (!u) throw Object(E.z)(null, E.w);
                if (n.setup) {
                    n.on(P.ub, at), t.warnings.forEach(function(t) {
                        n.trigger(P.ub, t)
                    });
                    var a = n.modelShim.clone();
                    if (a.error) throw a.error;
                    var c = n.apiQueue.queue.slice(0);
                    n.apiQueue.destroy(), Object(r.j)(n, u.prototype), n.setup(a, e, n.originalContainer, n._events, c, s);
                    var l = n._model;
                    return i.off("change:errorEvent", ut), l.on("change:errorEvent", ut), o.track(l), n.updatePlaylist(l.get("playlist"), l.get("feedData")).catch(function(t) {
                        throw Object(E.z)(t, E.u)
                    })
                }
            }).then(function() {
                n.setup && n.playerReady()
            }).catch(function(t) {
                n.setup && function(t, e, n) {
                    Promise.resolve().then(function() {
                        var r = Object(E.A)(E.r, E.y, n),
                            i = t._model || t.modelShim;
                        r.message = r.message || i.get("localization").errors[r.key], delete r.key;
                        var o = i.get("contextual");
                        if (!o) {
                            var u = Object(Z.a)(t, r);
                            Z.a.cloneIcon && u.querySelector(".jw-icon").appendChild(Z.a.cloneIcon("error")), ct(t, u)
                        }
                        i.set("errorEvent", r), i.set("state", P.mb), t.trigger(P.jb, r), o && e.remove()
                    })
                }(n, e, t)
            })
        },
        playerDestroy: function() {
            this.apiQueue && this.apiQueue.destroy(), this.setup && this.setup.destroy(), this.currentContainer !== this.originalContainer && ct(this, this.originalContainer), this.off(), this._events = this._model = this.modelShim = this.apiQueue = this.setup = null
        },
        getContainer: function() {
            return this.currentContainer
        },
        get: function(t) {
            if (this.modelShim) return t in this.mediaShim ? this.mediaShim[t] : this.modelShim.get(t)
        },
        getItemQoe: function() {
            return this.modelShim._qoeItem
        },
        getConfig: function() {
            return Object(r.j)({}, this.modelShim.attributes, this.mediaShim)
        },
        getCurrentCaptions: function() {
            return this.get("captionsIndex")
        },
        getWidth: function() {
            return this.get("containerWidth")
        },
        getHeight: function() {
            return this.get("containerHeight")
        },
        getMute: function() {
            return this.get("mute")
        },
        getProvider: function() {
            return this.get("provider")
        },
        getState: function() {
            return this.get("state")
        },
        getAudioTracks: function() {
            return null
        },
        getCaptionsList: function() {
            return null
        },
        getQualityLevels: function() {
            return null
        },
        getVisualQuality: function() {
            return null
        },
        getCurrentQuality: function() {
            return -1
        },
        getCurrentAudioTrack: function() {
            return -1
        },
        getSafeRegion: function() {
            return {
                x: 0,
                y: 0,
                width: 0,
                height: 0
            }
        },
        isBeforeComplete: function() {
            return !1
        },
        isBeforePlay: function() {
            return !1
        },
        createInstream: function() {
            return null
        },
        skipAd: function() {},
        attachMedia: function() {},
        detachMedia: function() {
            return null
        }
    });
    e.a = ot
}, function(t, e, n) {
    "use strict";
    n.d(e, "a", function() {
        return i
    });
    var r = n(6);

    function i(t) {
        return "hls" === t.type && r.OS.android ? !1 !== t.androidhls && (!r.Browser.firefox && parseFloat(r.OS.version.version) >= 4.4) : null
    }
}, function(t, e, n) {
    "use strict";
    n.r(e);
    var r = n(0),
        i = setTimeout;

    function o() {}

    function u(t) {
        if (!(this instanceof u)) throw new TypeError("Promises must be constructed via new");
        if ("function" != typeof t) throw new TypeError("not a function");
        this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], d(t, this)
    }

    function a(t, e) {
        for (; 3 === t._state;) t = t._value;
        0 !== t._state ? (t._handled = !0, u._immediateFn(function() {
            var n = 1 === t._state ? e.onFulfilled : e.onRejected;
            if (null !== n) {
                var r;
                try {
                    r = n(t._value)
                } catch (t) {
                    return void s(e.promise, t)
                }
                c(e.promise, r)
            } else(1 === t._state ? c : s)(e.promise, t._value)
        })) : t._deferreds.push(e)
    }

    function c(t, e) {
        try {
            if (e === t) throw new TypeError("A promise cannot be resolved with itself.");
            if (e && ("object" == typeof e || "function" == typeof e)) {
                var n = e.then;
                if (e instanceof u) return t._state = 3, t._value = e, void l(t);
                if ("function" == typeof n) return void d((r = n, i = e, function() {
                    r.apply(i, arguments)
                }), t)
            }
            t._state = 1, t._value = e, l(t)
        } catch (e) {
            s(t, e)
        }
        var r, i
    }

    function s(t, e) {
        t._state = 2, t._value = e, l(t)
    }

    function l(t) {
        2 === t._state && 0 === t._deferreds.length && u._immediateFn(function() {
            t._handled || u._unhandledRejectionFn(t._value)
        });
        for (var e = 0, n = t._deferreds.length; e < n; e++) a(t, t._deferreds[e]);
        t._deferreds = null
    }

    function f(t, e, n) {
        this.onFulfilled = "function" == typeof t ? t : null, this.onRejected = "function" == typeof e ? e : null, this.promise = n
    }

    function d(t, e) {
        var n = !1;
        try {
            t(function(t) {
                n || (n = !0, c(e, t))
            }, function(t) {
                n || (n = !0, s(e, t))
            })
        } catch (t) {
            if (n) return;
            n = !0, s(e, t)
        }
    }
    u.prototype.catch = function(t) {
        return this.then(null, t)
    }, u.prototype.then = function(t, e) {
        var n = new this.constructor(o);
        return a(this, new f(t, e, n)), n
    }, u.prototype.finally = function(t) {
        var e = this.constructor;
        return this.then(function(n) {
            return e.resolve(t()).then(function() {
                return n
            })
        }, function(n) {
            return e.resolve(t()).then(function() {
                return e.reject(n)
            })
        })
    }, u.all = function(t) {
        return new u(function(e, n) {
            if (!t || void 0 === t.length) throw new TypeError("Promise.all accepts an array");
            var r = Array.prototype.slice.call(t);
            if (0 === r.length) return e([]);
            var i = r.length;

            function o(t, u) {
                try {
                    if (u && ("object" == typeof u || "function" == typeof u)) {
                        var a = u.then;
                        if ("function" == typeof a) return void a.call(u, function(e) {
                            o(t, e)
                        }, n)
                    }
                    r[t] = u, 0 == --i && e(r)
                } catch (t) {
                    n(t)
                }
            }
            for (var u = 0; u < r.length; u++) o(u, r[u])
        })
    }, u.resolve = function(t) {
        return t && "object" == typeof t && t.constructor === u ? t : new u(function(e) {
            e(t)
        })
    }, u.reject = function(t) {
        return new u(function(e, n) {
            n(t)
        })
    }, u.race = function(t) {
        return new u(function(e, n) {
            for (var r = 0, i = t.length; r < i; r++) t[r].then(e, n)
        })
    }, u._immediateFn = "function" == typeof setImmediate && function(t) {
        setImmediate(t)
    } || function(t) {
        i(t, 0)
    }, u._unhandledRejectionFn = function(t) {
        "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", t)
    };
    var p = u;
    window.Promise || (window.Promise = p);
    var h = n(19),
        v = n(14),
        g = n(15),
        b = n(16),
        m = {
            availableProviders: g.a,
            registerProvider: b.a
        },
        y = n(25);
    m.registerPlugin = function(t, e, n) {
        "jwpsrv" !== t && Object(y.b)(t, e, n)
    };
    var j = m,
        w = n(30),
        O = n(22),
        k = n(6),
        C = n(58),
        P = n(3),
        x = n(31),
        S = n(8),
        T = n(7),
        E = n(11),
        _ = n(2);

    function A(t, e) {
        this.name = t, this.message = e.message || e.toString(), this.error = e
    }
    var F = n(5),
        N = n(9),
        M = n(23),
        I = n(27),
        L = n(51),
        R = n(47);
    var D = Object(r.j)({}, E, T, h, {
            addClass: N.a,
            hasClass: N.h,
            removeClass: N.n,
            replaceClass: N.o,
            toggleClass: N.u,
            classList: N.d,
            styleDimension: N.t,
            createElement: N.e,
            emptyElement: N.g,
            addStyleSheet: N.b,
            bounds: N.c,
            openLink: N.k,
            css: M.b,
            clearCss: M.a,
            style: M.d,
            transform: M.e,
            getRgba: M.c,
            ajax: I.a,
            crossdomain: function(t) {
                var e = document.createElement("a"),
                    n = document.createElement("a");
                e.href = location.href;
                try {
                    return n.href = t, n.href = n.href, e.protocol + "//" + e.host != n.protocol + "//" + n.host
                } catch (t) {}
                return !0
            },
            tryCatch: function(t, e) {
                var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [];
                if (O.a.debug) return t.apply(e || this, n);
                try {
                    return t.apply(e || this, n)
                } catch (e) {
                    return new A(t.name, e)
                }
            },
            Error: A,
            Timer: x.a,
            log: R.a,
            between: L.a,
            foreach: function(t, e) {
                for (var n in t) Object.prototype.hasOwnProperty.call(t, n) && e(n, t[n])
            },
            flashVersion: F.a,
            isIframe: F.m,
            indexOf: r.p,
            trim: _.h,
            pad: _.d,
            extension: _.a,
            hms: _.b,
            seconds: _.f,
            prefix: _.e,
            suffix: _.g,
            noop: function() {}
        }),
        B = 0;

    function z(t, e) {
        var n = new C.a(e);
        return n.on(P.hb, function(e) {
            t._qoe.tick("ready"), e.setupTime = t._qoe.between("setup", "ready")
        }), n.on("all", function(e, n) {
            t.trigger(e, n)
        }), n
    }

    function q(t, e) {
        var n = t.plugins;
        Object.keys(n).forEach(function(t) {
            delete n[t]
        }), e.get("setupConfig") && t.trigger("remove"), t.off(), e.playerDestroy(), e.getContainer().removeAttribute("data-jwplayer-id")
    }

    function V(t) {
        var e = ++B,
            n = t.id || "player-".concat(e),
            i = new x.a,
            o = {},
            u = z(this, t);
        i.tick("init"), t.setAttribute("data-jwplayer-id", n), Object.defineProperties(this, {
            id: {
                get: function() {
                    return n
                }
            },
            uniqueId: {
                get: function() {
                    return e
                }
            },
            plugins: {
                get: function() {
                    return o
                }
            },
            _qoe: {
                get: function() {
                    return i
                }
            },
            version: {
                get: function() {
                    return w.a
                }
            },
            Events: {
                get: function() {
                    return S.a
                }
            },
            utils: {
                get: function() {
                    return D
                }
            },
            _: {
                get: function() {
                    return r.f
                }
            }
        }), Object(r.j)(this, {
            _events: {},
            setup: function(e) {
                return i.clear("ready"), i.tick("setup"), q(this, u), (u = z(this, t)).init(e, this), this.on(e.events, null, this)
            },
            remove: function() {
                return function(t) {
                    for (var e = v.a.length; e--;)
                        if (v.a[e].uniqueId === t.uniqueId) {
                            v.a.splice(e, 1);
                            break
                        }
                }(this), q(this, u), this
            },
            qoe: function() {
                var t = u.getItemQoe();
                return {
                    setupTime: this._qoe.between("setup", "ready"),
                    firstFrame: t.getFirstFrame ? t.getFirstFrame() : null,
                    player: this._qoe.dump(),
                    item: t.dump()
                }
            },
            addCues: function(t) {
                return Array.isArray(t) && u.addCues(t), this
            },
            getAudioTracks: function() {
                return u.getAudioTracks()
            },
            getBuffer: function() {
                return u.get("buffer")
            },
            getCaptions: function() {
                return u.get("captions")
            },
            getCaptionsList: function() {
                return u.getCaptionsList()
            },
            getConfig: function() {
                return u.getConfig()
            },
            getContainer: function() {
                return u.getContainer()
            },
            getControls: function() {
                return u.get("controls")
            },
            getCues: function() {
                return u.get("cues")
            },
            getCurrentAudioTrack: function() {
                return u.getCurrentAudioTrack()
            },
            getCurrentCaptions: function() {
                return u.getCurrentCaptions()
            },
            getCurrentQuality: function() {
                return u.getCurrentQuality()
            },
            getCurrentTime: function() {
                return u.get("currentTime")
            },
            getDuration: function() {
                return u.get("duration")
            },
            getEnvironment: function() {
                return k
            },
            getFullscreen: function() {
                return u.get("fullscreen")
            },
            getHeight: function() {
                return u.getHeight()
            },
            getItemMeta: function() {
                return u.get("itemMeta") || {}
            },
            getMute: function() {
                return u.getMute()
            },
            getPlaybackRate: function() {
                return u.get("playbackRate")
            },
            getPlaylist: function() {
                return u.get("playlist")
            },
            getPlaylistIndex: function() {
                return u.get("item")
            },
            getPlaylistItem: function(t) {
                if (!D.exists(t)) return u.get("playlistItem");
                var e = this.getPlaylist();
                return e ? e[t] : null
            },
            getPosition: function() {
                return u.get("position")
            },
            getProvider: function() {
                return u.getProvider()
            },
            getQualityLevels: function() {
                return u.getQualityLevels()
            },
            getSafeRegion: function() {
                var t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                return u.getSafeRegion(t)
            },
            getState: function() {
                return u.getState()
            },
            getStretching: function() {
                return u.get("stretching")
            },
            getViewable: function() {
                return u.get("viewable")
            },
            getVisualQuality: function() {
                return u.getVisualQuality()
            },
            getVolume: function() {
                return u.get("volume")
            },
            getWidth: function() {
                return u.getWidth()
            },
            setCaptions: function(t) {
                return u.setCaptions(t), this
            },
            setConfig: function(t) {
                return u.setConfig(t), this
            },
            setControls: function(t) {
                return u.setControls(t), this
            },
            setCurrentAudioTrack: function(t) {
                u.setCurrentAudioTrack(t)
            },
            setCurrentCaptions: function(t) {
                u.setCurrentCaptions(t)
            },
            setCurrentQuality: function(t) {
                u.setCurrentQuality(t)
            },
            setFullscreen: function(t) {
                return u.setFullscreen(t), this
            },
            setMute: function(t) {
                return u.setMute(t), this
            },
            setPlaybackRate: function(t) {
                return u.setPlaybackRate(t), this
            },
            setPlaylistItem: function(t, e) {
                return u.setPlaylistItem(t, e), this
            },
            setCues: function(t) {
                return Array.isArray(t) && u.setCues(t), this
            },
            setVolume: function(t) {
                return u.setVolume(t), this
            },
            load: function(t, e) {
                return u.load(t, e), this
            },
            play: function(t) {
                return u.play(t), this
            },
            pause: function(t) {
                return u.pause(t), this
            },
            playToggle: function(t) {
                switch (this.getState()) {
                    case P.qb:
                    case P.kb:
                        return this.pause(t);
                    default:
                        return this.play(t)
                }
            },
            seek: function(t, e) {
                return u.seek(t, e), this
            },
            playlistItem: function(t, e) {
                return u.playlistItem(t, e), this
            },
            playlistNext: function(t) {
                return u.playlistNext(t), this
            },
            playlistPrev: function(t) {
                return u.playlistPrev(t), this
            },
            next: function(t) {
                return u.next(t), this
            },
            castToggle: function() {
                return u.castToggle(), this
            },
            createInstream: function() {
                return u.createInstream()
            },
            skipAd: function() {
                return u.skipAd(), this
            },
            stop: function() {
                return u.stop(), this
            },
            resize: function(t, e) {
                return u.resize(t, e), this
            },
            addButton: function(t, e, n, r, i) {
                return u.addButton(t, e, n, r, i), this
            },
            removeButton: function(t) {
                return u.removeButton(t), this
            },
            attachMedia: function() {
                return u.attachMedia(), this
            },
            detachMedia: function() {
                return u.detachMedia(), this
            },
            isBeforeComplete: function() {
                return u.isBeforeComplete()
            },
            isBeforePlay: function() {
                return u.isBeforePlay()
            }
        })
    }
    Object(r.j)(V.prototype, {
        on: function(t, e, n) {
            return S.c.call(this, t, e, n)
        },
        once: function(t, e, n) {
            return S.d.call(this, t, e, n)
        },
        off: function(t, e, n) {
            return S.b.call(this, t, e, n)
        },
        trigger: function(t, e) {
            return (e = r.f.isObject(e) ? Object(r.j)({}, e) : {}).type = t, O.a.debug ? S.e.call(this, t, e) : S.f.call(this, t, e)
        },
        getPlugin: function(t) {
            return this.plugins[t]
        },
        addPlugin: function(t, e) {
            this.plugins[t] = e, this.on("ready", e.addToPlayer), e.resize && this.on("resize", e.resizeHandler)
        },
        registerPlugin: function(t, e, n) {
            Object(y.b)(t, e, n)
        },
        getAdBlock: function() {
            return !1
        },
        playAd: function(t) {},
        pauseAd: function(t) {}
    }), n.p = Object(h.loadFrom)();
    var Q = function(t) {
        var e, n;
        if (t ? "string" == typeof t ? (e = X(t)) || (n = document.getElementById(t)) : "number" == typeof t ? e = v.a[t] : t.nodeType && (e = X((n = t).id || n.getAttribute("data-jwplayer-id"))) : e = v.a[0], e) return e;
        if (n) {
            var r = new V(n);
            return v.a.push(r), r
        }
        return {
            registerPlugin: y.b
        }
    };

    function X(t) {
        for (var e = 0; e < v.a.length; e++)
            if (v.a[e].id === t) return v.a[e];
        return null
    }
    Object.defineProperties(Q, {
        api: {
            get: function() {
                return j
            },
            set: function() {}
        },
        version: {
            get: function() {
                return w.a
            },
            set: function() {}
        },
        debug: {
            get: function() {
                return O.a.debug
            },
            set: function(t) {
                O.a.debug = !!t
            }
        }
    });
    var W = Q,
        U = n(35),
        H = n(26),
        Y = n(24),
        J = n(48),
        K = n(45),
        $ = n(39),
        G = r.f.extend,
        Z = {};
    Z.api = j, Z._ = r.f, Z.version = "8.8.5+commercial_v8-8-5.319.commercial.0820c98.hlsjs..jwplayer.d97ec77.dai.45542e3.freewheel.9422044.googima.be298d1.vast.e4647a1.analytics.f3dc2fa.gapro.8d11024", Z.utils = Object(r.j)(D, {
        key: H.b,
        extend: G,
        scriptloader: Y.a,
        rssparser: {
            parse: K.a
        },
        tea: J.a,
        UI: U.a
    }), Z.utils.css.style = Z.utils.style, Z.vid = $.a;
    var tt = Z,
        et = window;
    Object(r.j)(W, tt), "function" == typeof et.define && et.define.amd && et.define([], function() {
        return W
    });
    var nt = W;
    et.jwplayer && (nt = et.jwplayer);
    e.default = nt
}]).default;