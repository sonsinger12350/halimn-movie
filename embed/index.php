<?php
$url = $_GET['url'];
if (strpos($url, 'ok.ru')) {
    $iframe = id_okru($url);
}elseif(strpos($url, 'dailymotion.com')) {
$iframe = hadpro_daily($url);
}elseif(strpos($url, 'fembed.com')) {
$iframe = hadpro_fembed($url);
} else {
    $iframe = $url;
}
function id_okru($url)
{
	preg_match('#(https://www.ok.ru/|https://ok.ru/)(video|live|videoembed)/([A-Za-z0-9]+)#s', $url, $match);
	$sources   = $match[3];
	$hadpro = 'https://ok.ru/videoembed/'.$sources;
    return $hadpro;
}
function hadpro_fembed($url)
{
	$hadpro = 'https://fembed.com/'.$url;
    return $hadpro;
}
function hadpro_daily($url)
{ 
    $haun = str_replace('embed/', '', $url);
	preg_match('#(https://www.dailymotion.com/|https://dailymotion.com/)(video)/([A-Za-z0-9]+)#s', $haun, $match);
	$sources   = $match[3];
	$hadpro = 'https://www.dailymotion.com/embed/video/'.$sources;
    return $hadpro;
}
?>
<script src="wp-content/themes/tvhay/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="playergk/jwplayer885/jwplayer887.js?v=2.5"></script>
<script type="text/javascript">
    jwplayer.key = "MBvrieqNdmVL4jV0x6LPJ0wKB/Nbz2Qq/lqm3g==";
</script>
<div id="adsmessage" class="adsmessage" style="display:none;"></div>
<div id="playerjw7">Trình duyệt của bạn không hỗ trợ xem phim bằng Player HTML5. Vui lòng cài đặt Chrome hoặc Firefox</div>
<script type="text/javascript">
    var page_url = window.location.href;
    console.log(page_url);
    // var ads	= ['/preload/five88.php','/preload/789club.php','/preload/loadmibet.php','/preload/b52.php','/guide1/pre-11bet.xml?sv=3.1','/preload/188bet.php'];
    // var arrPreroll = ads[Math.floor((Math.random() * 6) + 1)];
    var arrPreroll = "preload/oxbet.php";
    console.log(arrPreroll);
    var sources = [{
        file: '<?= $iframe ?>',
        type: 'embed',
        label: '720p',
        default: false
    }, ];
    var tracks = [];
    var currentVolume;
    var skipDelay = 15,
        displaySkip = false,
        skipTimeOut = false,
        reloadTimes = 0,
        timeToSeek = 0,
        manualSeek = false,
        seekTimeOut, playTimeout, playAds = 0,
        maxAds = 1;
    if (typeof arrPreroll == "undefined") {
        var arrPreroll = [];
        maxAds = 0;
    }
    var advertising = {
        client: "playergk/jwplayer885/js/v/8.8.5/js/vast.js",
        admessage: 'Quảng cáo còn XX giây.',
        skipoffset: 6,
        skiptext: 'Bỏ qua quảng cáo',
        skipmessage: 'Bỏ qua sau xxs',
        width: '100%',
        height: '100%',
        autostart: true,
        schedule: {
            preroll: {
                offset: 'pre',
                tag: arrPreroll,
            },
        }
    };

    var playerInstance = jwplayer('playerjw7');

    function setupVideo() {
        var firstSource = [{
            file: 'playergk/1s_blank.mp4',
            type: 'mp4',
            label: '360p',
            default: true
        }];

        if (playAds < maxAds) {
            console.log(maxAds);
            playAds++;
            //$("#adsmessage").html("Quảng cáo").show();
            playerInstance.setup({
                sources: firstSource,
                tracks: tracks,
                captions: {
                    color: '#FFCC00',
                    fontSize: 17,
                    backgroundOpacity: 0,
                    fontfamily: "Tahoma",
                    edgeStyle: "raised"
                },

                width: '100%',
                height: '100%',
                primary: "html5",
                controls: true,
                //aspectratio: '16:9',
                flashplayer: 'playergk/jwplayer885/jwplayer.flash.swf',
                autostart: true,
                advertising: advertising,
            });
            setUpVideoEvent();
        } else {
            playAds++;
            $("#adsmessage").hide();
            if (self.sources[0].type == "embed") {
                $("#playerjw7").html('<iframe width="100%" height="100%" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" src="' + self.sources[0].file + '" frameborder="0" allowfullscreen=""></iframe>');
            } else {
                playerInstance.setup({
                    sources: sources,
                    tracks: tracks,
                    captions: {
                        color: '#FFCC00',
                        fontSize: 17,
                        backgroundOpacity: 0,
                        fontfamily: "Tahoma",
                        edgeStyle: "raised"
                    },

                    width: '100%',
                    height: '100%',
                    primary: "html5",
                    controls: true,
                    //aspectratio: '16:9',
                    flashplayer: 'playergk/jwplayer885/jwplayer.flash.swf',
                    autostart: true,
                });
                setUpVideoEvent();
            }
        }
    }
    this.setUpVideoEvent = function() {
        playerInstance.on('complete', function() {

            nextEpiV2();
            console.log(nextEpiV2());
        }).on('ready', function() {
            if (seekTimeOut != null) {
                clearTimeout(seekTimeOut);
            }

            if (timeToSeek > 8) seekTimeOut = setTimeout(function() {
                playerInstance.seek(timeToSeek);
                manualSeek = false;
            }, 500);

            if (playTimeout != null) {
                clearTimeout(playTimeout);
                playTimeout = null;
            }
            playTimeout = setTimeout(function() {
                playerInstance.play(true);
                manualSeek = false;
            }, 1000);
        }).on('error', function(message) {
            var time = playerInstance.getPosition();
            if (time > 8 && (manualSeek == false)) timeToSeek = time;
            if (reloadTimes < 5) {
                reloadTimes++;
                if (message['message'] == 'Error loading media: File could not be played') {
                    setTimeout(function() {
                        jQuery("#playerjw7").find(".jw-title-primary").text("Có chút vấn đề khi load phim. Đang thử lại...").show();
                    }, 100);
                }
                setTimeout(function() {
                    playerInstance.remove();
                    setupVideo();
                }, 2000);
            } else {
                if (message['message'] == 'Error loading media: File could not be played') {
                    setTimeout(function() {
                        jQuery("#playerjw7").find(".jw-title-primary").text("Có chút vấn đề khi load phim").show();
                        jQuery("#playerjw7").find(".jw-title-secondary").text("Chạy lại trang (ấn F5) hoặc mở link khác bên dưới").show();
                    }, 100);
                }
            }
        }).on('beforePlay', function() {
            var volume = readCookie('volume');
            if (volume == undefined || volume < 1) {
                createCookie('volume', 75, 7);
            }
            playerInstance.setVolume(volume);
        }).on('volume', function(event) {
            createCookie('volume', event.volume, 7);
        }).on('adPlay', function() {
            currentVolume = playerInstance.getVolume();
            playerInstance.setVolume(50);
            skipTimeOut = setTimeout(function() {
                if (displaySkip == false) {
                    $("#skipad-inner").show();
                    $("#skipad-inner").click(function() {
                        $("#skipad-inner").hide();
                        playerInstance.remove();
                        setupVideo();
                    });
                    displaySkip = true;
                }
            }, 1000 + skipDelay * 1000);
        }).on('play', function() {
            playerInstance.setCurrentCaptions(1);
            $("#skipad-inner").hide();
            clearTimeout(skipTimeOut);
            if (playAds <= maxAds) {
                playerInstance.remove();
                setupVideo();
            } else {
                if (currentVolume > 0) {
                    playerInstance.setVolume(currentVolume);
                    currentVolume = 0
                }
            }
        }).on('seek', function(event) {
            manualSeek = true;
            timeToSeek = event.offset;
        }).on('seeked', function(event) {
            manualSeek = false;
        }).on('adTime', function(event) {
            if (event.position > skipDelay && (displaySkip == false)) {
                $("#skipad-inner").show();
                setTimeout(function() {
                    $("#skipad-inner").hide();
                }, 10000);
                $("#skipad-inner").click(function() {
                    $("#skipad-inner").hide();
                    playerInstance.remove();
                    setupVideo();
                });
                displaySkip = true;
            }
        }).on('adSkipped', function(event) {
            $("#skipad-inner").hide();
            displaySkip = true;
        }).on('adComplete', function(event) {
            $("#skipad-inner").hide();
            displaySkip = true;
        });
    }
    setupVideo();
</script>
<script src="ads_code_1.js" type="text/javascript"></script>
<!-- logo 
<div class="t_logo">
	<a href="//phimplus.xyz" title="PHIMPLUS.XYZ" target="_blank"><img src="//phimplus.xyz/wp-content/uploads/2021/11/logo.gif" alt="PHIMPLUS"></a>
</div>
<style>
	.t_logo {
		position: absolute;
		top: 20;
		left: 15px;
		z-index: 1001;
	}
	.t_logo img {
		max-width: 80px;
	}
</style>-->