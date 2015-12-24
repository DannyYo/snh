@extends('app')
@section('content')
<article class="format-image group">
    <h2 class="post-title pad">
        <a href="/users/{{ $user->id }}" rel="bookmark"> {{ $user->account }}</a>
    </h2>
    <div class="post-inner">
        <div class="post-content pad">
            <div class="entry custome">
                {{ $user->password }}
            </div>
        </div>
    </div>

    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#"
                                                                                      class="bds_qzone"
                                                                                      data-cmd="qzone"></a><a
            title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到微信" href="#" class="bds_weixin"
                                                                               data-cmd="weixin"></a><a title="分享到腾讯微博"
                                                                                                        href="#"
                                                                                                        class="bds_tqq"
                                                                                                        data-cmd="tqq"></a><a
            title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a></div>
    <script>window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "", "bdMini": "1", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "24"}, "share": {}, "image": {"viewList": ["qzone", "tsina", "weixin", "tqq", "renren"], "viewText": "分享到：", "viewSize": "16"}, "selectShare": {"bdContainerClass": null, "bdSelectMiniList": ["qzone", "tsina", "weixin", "tqq", "renren"]}};
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>

</article>
@endsection