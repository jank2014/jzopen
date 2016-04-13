(jQuery), + function(t) {
	"use strict";
	t(document).delegate(".ajax-get", "click", function() {
		var e, i = this;
		return t(this).hasClass("confirm") && !confirm("确认要执行该操作吗?") ? !1 : (((e = t(this).attr("href")) || (e = t(this).attr("url"))) && (t(this).addClass("disabled").attr("autocomplete", "off").prop("disabled", !0), t.get(e).success(function(e) {
			if (1 == e.status) {
				if (e.url && !t(i).hasClass("no-refresh")) var o = e.info + " 页面即将自动跳转~";
				else var o = e.info;
				t.alertMessager(o, "success"), setTimeout(function() {
					return t(i).removeClass("disabled").prop("disabled", !1), t(i).hasClass("no-refresh") ? !1 : void(e.url && !t(i).hasClass("no-forward") ? location.href = e.url : location.reload())
				}, 2e3)
			} else 1 == e.login ? t("#login-modal").modal() : t.alertMessager(e.info, "danger"), setTimeout(function() {
				t(i).removeClass("disabled").prop("disabled", !1)
			}, 2e3)
		})), !1)
	})
}(jQuery), + function(t) {
	"use strict";
	t(document).delegate(".ajax-post", "click", function() {
		var e, i, o, n = t(this).attr("target-form"),
			s = this,
			a = !1;
		if ("submit" == t(this).attr("type") || (e = t(this).attr("href")) || (e = t(this).attr("url"))) {
			if (o = t("." + n), "true" === t(this).attr("hide-data")) o = t(".hide-data"), i = o.serialize();
			else {
				if (void 0 == o.get(0)) return !1;
				if ("FORM" == o.get(0).nodeName) {
					if (t(this).hasClass("confirm") && !confirm("确认要执行该操作吗?")) return !1;
					e = void 0 !== t(this).attr("url") ? t(this).attr("url") : o.get(0).action, i = o.serialize()
				} else if ("INPUT" == o.get(0).nodeName || "SELECT" == o.get(0).nodeName || "TEXTAREA" == o.get(0).nodeName) {
					if (o.each(function(t, e) {
							"checkbox" == e.type && 1 == e.checked && (a = !0)
						}), a && t(this).hasClass("confirm") && !confirm("确认要执行该操作吗?")) return !1;
					i = o.serialize()
				} else {
					if (t(this).hasClass("confirm") && !confirm("确认要执行该操作吗?")) return !1;
					i = o.find("input,select,textarea").serialize()
				}
			}
			t(s).addClass("disabled").attr("autocomplete", "off").prop("disabled", !0), t.post(e, i).success(function(e) {
				if (1 == e.status) {
					if (e.url && !t(s).hasClass("no-refresh")) var i = e.info + " 页面即将自动跳转~";
					else var i = e.info;
					t.alertMessager(i, "success"), setTimeout(function() {
						return t(s).hasClass("no-refresh") ? !1 : void(e.url && !t(s).hasClass("no-forward") ? location.href = e.url : location.reload())
					}, 2e3)
				} else t.alertMessager(e.info, "danger"), setTimeout(function() {
					t(s).removeClass("disabled").prop("disabled", !1)
				}, 2e3), t(".reload-verify").length > 0 && t(".reload-verify").click()
			})
		}
		return !1
	})
}(jQuery), + function(t) {
	"use strict";
	t.alertMessager = function(e, i, o) {
		i = i ? i : "danger";
		var n = '<div class="growl" style="top: 50px;left: 0;right:0;margin:0 auto;"><div class="alert alert-full alert-dismissable alert-' + i + '"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' + e + "</div></div>";
		t(".growl").remove(), t("body").prepend(n), setTimeout(function() {
			t(".growl").remove()
		}, o ? o : 2e3)
	}
}