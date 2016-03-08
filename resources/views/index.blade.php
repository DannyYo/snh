@extends('home')
<!--carousel-->
@include('common.Carousel')
@section('title', '运动分享网站')
@section('content')
<blockquote>
    <small>写在最前</small>
    <p>SNH 是年轻时尚运动健康分享社交网站</p>
</blockquote>

<section class="main-section" id="function"><!--main-section-start-->
    <div class="container">
        <div class="bs-docs-section">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>你可以在这里：</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="wow fadeInLeft delay-05s">
                <blockquote>
                    <p>在SNH，你可以发表你的心情，上传你的生活照片，结交志同道合的朋友，
                        用一句话随意记录生活，用手机随时随地发动态。</p>
                </blockquote>
            </div>
        </div>
    </div>
</section><!--main-section-end-->

<section class="main-section" id="platform"><!--main-section-start-->
    <div class="container">
        <div class="bs-docs-section">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>你可以在哪里看到我们：</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="wow fadeInLeft delay-05s">
                <blockquote>
                    <p>可以在PC、各种移动设备上访问到我们。<br>
                        不用下载APP直接扫二维码手机访问 => <img src="{{asset('QrCode.png')}}" width="200px"></p>
                </blockquote>
            </div>
        </div>
    </div>
</section><!--main-section-end-->

<section class="main-section" id="concept"><!--main-section-start-->
    <div class="container">
        <div class="bs-docs-section">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>我们相信运动：</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="wow fadeInLeft delay-05s">
                <blockquote>
                    <p><h3>促进身体的生长</h3></p>
                    <small>数据表明，不喜欢运动者的肌肉只占体重的40%左右，而经常锻炼身体者（比如竞赛运动员）的肌肉重量可达体重的45%-50%。除此之外，数据还表明经常参加身体锻炼可以增大胸围，在不增加体重的情况下塑造体形，在不耗损骨骼质量的前提下增加身高，保持身体各部分的比例协调，使你看上去更美！</small>
                </blockquote>
                <blockquote class="blockquote-reverse">
                    <p><h3>提升呼吸和循环系统功能</h3></p>
                    <small>心脏是循环系统的中心，数据表明，经常运动者的心脏体积比一般人的心脏体积大，平静时每分钟的脉搏次数比不喜欢运动者的脉搏次数少，而每搏输出量比不喜欢运动者大。不喜欢运动者平静时每分钟输出血量约5000毫升，剧烈运动时约为20000毫升，而经常运动者剧烈运动时每分钟输出血量则可以达到35000毫升。</small>
                </blockquote>
                <blockquote>
                    <p><h3>对神经系统有益</h3></p>
                    <small>体育锻炼可以提高呼吸系统和血液循环系统的功能，提高摄氧量和血液输出量，使神经细胞获得更充足的能量和氧气的供应，利于神经系统特别是大脑的正常和高效工作，对于提升神经工作过程的强度、均衡性、灵活性等方面有明显的作用。</small>
                </blockquote>
                <blockquote class="blockquote-reverse">
                    <p><h3>使你有个好心情</h3></p>
                    <small>有研究数据表明，经常运动能够让大脑的兴奋与抑制过程进行合理的交替，在保持神经系统兴奋度的同时，避免了神经系统的过度紧张，从而达到消除疲劳、让头脑保持清醒的目的。在运动中所有的注意力都会集中在如何运动上，从而可以抛弃其他一切思想和情绪负担。另外，运动可以提高睡眠质量，保证在清醒时有充足的精力，这对于学习来说极为重要。</small>
                </blockquote>
            </div>
        </div>
    </div>
</section><!--main-section-end-->

<section class="main-section" id="attention"><!--main-section-start-->
    <div class="container">
        <div class="bs-docs-section">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>我们希望：</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="wow fadeInLeft delay-05s">

                <div class="list-group">
                    <a  class="list-group-item">
                        <p class="list-group-item-heading"><h3>注册用户在SNH的言论(包括但不限于文字、图片、音频、视频，下同)不得违反国家的法律法规。<br>
                            根据《互联网新闻信息服务管理规定》，会员的言论不得含有下列内容：</h3></p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text"> (一)违反宪法确定的基本原则的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(二)危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(三)损害国家荣誉和利益的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(四)煽动民族仇恨、民族歧视，破坏民族团结的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(五)破坏国家宗教政策，宣扬邪教和封建迷信的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(六)散布谣言，扰乱社会秩序，破坏社会稳定的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(七)散布淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(八)侮辱或者诽谤他人，侵害他人合法权益的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(九)煽动非法集会、结社、游行、示威、聚众扰乱社会秩序的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(十)以非法民间组织名义活动的；</p>
                    </a>
                    <a  class="list-group-item">
                        <p class="list-group-item-text">(十一)含有法律、行政法规禁止的其他内容的。</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!--main-section-end-->
@endsection
@section('scripts')
<script>

</script>
@endsection