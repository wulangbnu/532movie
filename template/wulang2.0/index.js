function page_impl(){function a(){var g=LETV.UI.slider("#j-focusPic",{sliderFinder:".j-slider",sliderItemFinder:".j-item",sliderItemWidth:970,sliderItemCount:8,stepSize:1,clipSize:1,mode:"round",onSlidBegin:function(k,j){$("#j-focusPic .j-info").hide();$("#j-focusPic .j-infobg").css("opacity",0)},onSlidEnd:function(l,j){var k=[];k.push("<div class='infotxt w'>");k.push($("#j-focusPic .j-infocontainer>.infotxt").eq(j.index%8).html());k.push("</div>");$("#j-focusPic .j-info").html(k.join("")).show();$("#j-focusPic .j-infobg").animate({opacity:0.5})}});var i=LETV.UI.slider("#j-focusBtns",{sliderFinder:".j-slider",sliderItemFinder:".j-item",sliderItemWidth:41,sliderItemCount:8,clipSize:8,stepSize:8,onSlidBegin:function(k,j){$("#j-focusBtns .pre").addClass("on-1");$("#j-focusBtns .next").addClass("on-2")},onSlidEnd:function(k,j){if(k.isPreEnable()){$("#j-focusBtns .pre").removeClass("on-1")}else{$("#j-focusBtns .pre").addClass("on-1")}if(k.isNextEnable()){$("#j-focusBtns .next").removeClass("on-2")}else{$("#j-focusBtns .next").addClass("on-2")}}});var e=$("#j-focusBtns .j-item");var d=$("#j-focusBtns .pre , #j-focusBtns .next");var b=0;var c=e.eq(b);c.siblings().removeClass("on");c.addClass("on");var f=LETV.Common.timer(function(){b+=1;b=b%8;var j=e.eq(b);j.siblings().removeClass("on");j.addClass("on");g.gotoNextStep();if(b==0){i.gotoPreStep()}if(b==8){i.gotoNextStep()}},{interval:5000,immediately:false});f.start();$(".Aflash").mouseover(function(j){f.stop()}).mouseout(function(j){f.start()});e.each(function(k,j){var l=$(j);l.mouseover(function(m){if(k==b){return}b=k;g.gotoIndex(b);l.siblings().removeClass("on");l.addClass("on")})});var h=null;d.mouseover(function(k){var j=$(this);if(j.hasClass("on-1")||j.hasClass("on-2")){return}clearTimeout(h);var l=$(this).find("i");h=setTimeout(function(){l.fadeIn("fast")},200)}).mouseout(function(j){clearTimeout(h);var k=$(this).find("i");h=setTimeout(function(){k.fadeOut("fast")},200)}).click(function(k){var j=$(this);if(j.hasClass("on-1")||j.hasClass("on-2")){return}if($(this).hasClass("pre")){i.gotoPreStep()}else{i.gotoNextStep()}})}a();
    LETV.UI.simpleTab("#j-ranktv", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    });
    LETV.UI.simpleTab("#j-rankcomic", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    });
	LETV.UI.simpleTab("#j-ranksport", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    });
	LETV.UI.simpleTab("#j-rankdocumentary", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    });
    LETV.UI.simpleTab("#j-rankzongyi", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    });
    LETV.UI.simpleTab("#j-rankmovie", {
        tabs: "span>a",
        tabsFor: ">ol",
        switchClass: "active"
    })
}