async function loadFeeds() {
    let ftc_data    = await fetch('controllers/feed.php');
    let rsp         = await ftc_data.json();

    if (rsp && rsp.length > 0) {
        let feeds = mountFeed(rsp)
        
        let fieldFeeds = document.getElementById('feeds')
        if (fieldFeeds) fieldFeeds.innerHTML = feeds
    }
}

function mountFeed(dataFeed) {
    let feed = ''
    if (dataFeed!==false && dataFeed.length > 0) {
        for (const itemFeed of dataFeed) {
            let caption     = itemFeed.caption      ?   itemFeed.caption    : ''
            let name        = itemFeed.username     ?   itemFeed.username   : ''
            let link        = itemFeed.permalink    ?   itemFeed.permalink  : ''
            let image       = itemFeed.media_url    ?   itemFeed.media_url  : ''

            if ( itemFeed.media_type === 'IMAGE' ) {
                feed += `
                <article style='padding:10px;overflow:hidden' title='${name}'>
                <div>
                    <div style="flex-direction: column; padding-bottom: 0px; padding-top: 0px;width:100%;max-width:300px">
                        <div class="Nnq7C weEfm">
                            <div class="v1Nh3 kIKUG  _bz0w">
                            <a href="${link} " target='_blank'>
                                    <div class="eLAPa" style='position:relative'>
                                        <div class="KL4Bh">
                                            <img
                                                width='225px'
                                                height='225px'
                                                alt="${caption}"
                                                src="${image}"
                                                style='border-radius: 5%;'
                                                >
                                        </div>
                                        <div class="_9AhH0" style='
                                            background-image: linear-gradient(353deg, #0000008a 25%, transparent 50%);
                                            position: absolute;
                                            width: 98%;
                                            height: 98%;
                                            top: 0;
                                            left: 0;
                                            border-radius: 5%;
                                        '></div>
                                    </div>
                                    <div style="position:relative">
                                        <div style="position: absolute;top: 0;left: 100px;margin-top: -125px;margin: -125 100px 0 0;">
                                            <svg aria-label="Vídeo" class="_8-yf5 " color="#ffffff" fill="#ffffff" height="18"
                                                role="img" viewBox="0 0 24 24" width="18">
                                                <path
                                                    d="M5.888 22.5a3.46 3.46 0 01-1.721-.46l-.003-.002a3.451 3.451 0 01-1.72-2.982V4.943a3.445 3.445 0 015.163-2.987l12.226 7.059a3.444 3.444 0 01-.001 5.967l-12.22 7.056a3.462 3.462 0 01-1.724.462z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div style="position: absolute;
                                        top: 0;
                                        color: #FFF;
                                        font-size: 12px;
                                        font-family: inherit;
                                        text-align: center;
                                        left: 0;
                                        width: 225px;
                                        overflow: hidden;
                                        margin: -40px 0;
                                        display: block;
                                        background-image: linear-gradient(1deg, #000000b3 15%, transparent);"
                                        >
                                            ${caption}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
                `
            }
        }
    }
    return feed
}

document.addEventListener("DOMContentLoaded", function (event) {
    loadFeeds()
})