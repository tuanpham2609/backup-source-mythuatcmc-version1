<footer>
    <div class="container">
        <div class="row ed-flex-ft">
            <div class="col-md-4 col-sm-6">
                @foreach($customs as $value)
                    <img class="logo-ft img-responsive" src="img/{{$value->logo}}">
                @endforeach
                <ul>
                    <li>Hãy đến với trung tâm chúng tôi để cảm nhận được về mỹ thuật</li>
                    <li><i class="fa fa-map-marker"></i> 18/47/10 Nguyễn Cửu Vân, phường 17, quận Bình Thạnh</li>
                    <li><i class="fa fa-phone"></i> 0968314416</li>
                    <li><i class="fa fa-envelope"></i>thanhvo.info96@gmail.com</li>
                </ul>
            </div>

            <div class="col-md-4 col-sm-6 ">
                <ul>
                    <h4>Tin tức mới nhất về cmc chúng tôi</h4>
                    @foreach($cate as $value)
                        <li><a href="the-loai/{{$value->id}}/{{$value->slug}}.html">{{$value->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-md-4 col-sm-6 ">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmythuatcmc%2F%3F__tn__%3DkC-R%26eid%3DARBz8tocfwT9hVLbHIeUdsaOScddCkoC6HPZVFQlulnNp2nZjGhQzfO1uuLOd2IR4mFFpT-rgZGd1zNJ%26hc_ref%3DARTRqJJaP0SeX91uA3pB0Ltd0Hyo8QF8AKHqLJLKXFGvOQZgrRQz24HaszxdIwcQQD4%26__xts__[0]%3D68.ARA3wdln0Iv9VLt9USQUuRLkAhHhPE1BLRrd6zKkayRPEDUj-SKb1Di2Qu3BvXjsiEHl87RIUsevZ8Lr9pgbHo3M7iJjqHEBZh0NIP2Oh-ypQWZ9hkobmJ9K8d-hBB0eUskTzOXqJNZgFOZGBPgok4FF8Xl_0y1_0ABpZXotEqClQScu47Ynpaa5gqWH0nO26c7uUcWHdFKU0hXo5wYI8LLvdvnsjBleP0Nu1RzmQtH7aG5mt7NYSfnP6p2Q4ItDu_g1WU8QjkVcqWmUy_RE2EzFDJjI1zp7oV-hObZPmCpfq_v7xhhJHg3NZ91eRRTZkLhaVOebQkPZwunpTSJ_xcQ_EBdjMla2VEcIlwRmZ0OPHuNXahrF9TTtmGrQcz3TscChSAna2HH1PxzUu_wODiYC9Ihgim9iMXudx9WobI0rhP20qoWiK03bUc3xoJh8AXg7YSBJI-DXu8gfQkSCwdScTHhv-jSlW6H05Nv80LjQ-HxTuDZGqjKrBoCNOCJrBsHwgVpEajdRIl6unPMeUba0pNz2ZGZq0lB5Y7E&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </div>
    </div>
    <div class="bottom-ft">
        <div class="container">
            <div class="row flex-mid">
                <div class="col-sm-12 ft-final-1 text-center">
                    <p>Copyright © 2018. Designed by <a href="#" target="_blank">tuanpham</a>. All rights reserved</p>
                </div>

            </div>
        </div>
    </div>
</footer>
<a href="javascript:" id="top" style="display: none;"><i class="fa fa-chevron-up"></i></a>
<a href="tel:0968314416" class="phone-cmc"><i class="fa fa-phone"></i></a>
