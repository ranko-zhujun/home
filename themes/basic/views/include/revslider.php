<?php
$data = array(
    ['imageurl' => '/upload/bg-1.jpg', 'content' => [
        'info' => '个人/企业可以商用', 'title' => '企业网站标准模板', 'summary' => '基于GPL协议进行开源', 'btntext' => '源码下载', 'btnhref' => 'http://www.ranko.cn/'
    ]],
    ['imageurl' => '/upload/bg-2.jpg', 'content' => [
        'info' => '应用软件服务中心', 'title' => '无锡市蓝科创想', 'summary' => '致力于提供一站式应用软件服务', 'btntext' => '了解详情', 'btnhref' => 'http://www.ranko.cn/'
    ]]
);
?>
<div class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export"
     data-source="gallery"
     style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
    <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
        <ul>
            <?php
            if (sizeof($data) > 0) {
                foreach ($data as $item) {
                    ?>
                    <li data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-masterspeed="2000" data-rotate="0"
                        data-saveperformance="off" data-title="HTML5 Video" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <img src="<?php echo $item['imageurl']; ?>" alt="" data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgparallax="10" class="rev-slidebg" data-no-retina >
                        <?php
                        if (isset($item['content'])) {
                            ?>
                            <?php
                            if (isset($item['content']['info'])) {
                                ?>
                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption NotGeneric-Icon   tp-resizeme rs-parallaxlevel-1"
                                     id="slide-3046-layer-8"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-75','-75','-75','-75']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 10; white-space: nowrap;text-transform:left;cursor:default;">
                                    <?php echo $item['content']['info']; ?>
                                </div>
                                <?php
                            }
                            if (isset($item['content']['title'])) {
                                ?>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption NotGeneric-Title tp-resizeme rs-parallaxlevel-3"
                                     id="slide-3046-layer-1"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-10','-10','-10','-10']"
                                     data-fontsize="['50','50','36','22']"
                                     data-lineheight="['70','70','70','30']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames='[{"from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":2000,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[10,10,10,10]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[10,10,10,10]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 8; white-space: nowrap;text-transform:left;"><?php echo $item['content']['title']; ?>
                                </div>
                                <?php
                            }
                            if (isset($item['content']['summary'])) {
                                ?>
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-2"
                                     id="slide-3046-layer-4"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['50','50','50','50']"
                                     data-fontsize="['15','15','15','12']"
                                     data-lineheight="['60','60','60','22']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 9; white-space: nowrap;text-transform:left;"><?php echo $item['content']['summary']; ?>
                                </div>
                                <?php
                            }
                            if (isset($item['content']['btntext'])) {
                                ?>
                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption"
                                     id="slide-3005-layer-7"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']"
                                     data-voffset="['124','124','124','123']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="button"
                                     data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="off"
                                     data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[10,10,10,10]"
                                     data-paddingright="[30,30,30,30]"
                                     data-paddingbottom="[10,10,10,10]"
                                     data-paddingleft="[30,30,30,30]"
                                     style="z-index: 13; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                    <a href="<?php echo isset($item['content']['btnhref']) ? $item['content']['btnhref'] : ''; ?>"
                                       class="btn btn-border"><?php echo $item['content']['btntext']; ?></a></div>
                                <?php
                            }
                        }
                        ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
</div>
<script type="text/javascript">
    var tpj = jQuery;
    var revsliderhome;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_home").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_home");
        } else {
            revsliderhome = tpj("#rev_slider_home").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style: "zeus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        }
                    }
                    ,
                    bullets: {
                        enable: false,
                        hide_onmobile: true,
                        hide_under: 600,
                        style: "metis",
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 30,
                        space: 5,
                        tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                    }
                },
                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%",
                    presize: false
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [600, 600, 500, 400],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],
                    type: "mouse",
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    });
</script>