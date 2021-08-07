<footer id="footer" class="footer-area section-padding">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h3 class="footer-titel">关于 <span>我们</span></h3>
                    <ul class="footer-link">
                        <?php
                        foreach ($aboutus as $aboutitem){
                            ?>
                            <li><a href="<?php echo $aboutitem['href']; ?>"><?php echo $aboutitem['title']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-3">
                    <h3 class="footer-titel">常用<span> 链接</span></h3>
                    <ul class="footer-link">
                        <?php
                        foreach ($links as $link){
                            ?>
                            <li><a href="<?php echo $link['href']; ?>"><?php echo $link['title']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-3">
                    <h3 class="footer-titel">联系 <span>信息</span></h3>
                    <ul class="address">
                        <li>
                            <a href="#"><i class="lni-map-marker"></i><?php echo $contact['address']; ?></a>
                        </li>
                        <li>
                            <a href="#"><i class="lni-phone-handset"></i><?php echo $contact['phone']; ?></a>
                        </li>
                        <li>
                            <a href="#"><i class="lni-envelope"></i> <?php echo $contact['email']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h3 class="footer-titel">赞助我</h3>
                    <img src="http://static.ranko.cn/www.ranko.cn/alipay.jpg" width="61%" >
                </div>
            </div>
        </div>
    </div>
</footer>