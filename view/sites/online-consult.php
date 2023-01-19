
          <div class="right-bottom">
            <div class="right-body">

              <div class="consult-middle">
                <div class="body-top">
                  <h2>Onlayn konsultatsiya</h2>
                </div>

          <?php
          $fetch = Functions::getall("consultation");
          $no=0;
          foreach($fetch as $value) {

              $no++;
              $found = 0;
              $fullname="";
              $image="";
              $unvon="";
              $fetch1=Functions::getbyid("doctor",$value['doctorid']);
              foreach ($fetch1 as $value1){
                  $fullname=$value1['fullname'];
                  $image=$value1['doctor'];
                  $unvon=$value1['rankid'];
                  $fetch2=Functions::getbyid("rank",$unvon);
                  foreach ($fetch2 as $value2){
                      $unvon=$value2['name'];
                  }
              }
              $clinic="";


              echo('
                <div class="consult-doctor">
                  <div class="doctor-cart">
                    <div class="cart-header">
                      <p>' . $value['consultationtime'] . '</p>
                    </div>
                    <div class="cart-body">
                      <div class="image-doctor">
                        <img src="/files/images/doctor/' . $image . '" alt="' . $fullname . '" />
                      </div>
                      <div class="cart-detail">
                        <h3><a href="#">' . $fullname . '</a></h3>
                        <div class="experience">
                          <div class="stars">
                            <img src="/assets/images/star.png" alt="star" />
                            <img src="/assets/images/star.png" alt="star" />
                            <img src="/assets/images/star.png" alt="star" />
                            <img src="/assets/images/star.png" alt="star" />
                          </div>
                          <p>Izohlar: <span>0</span></p>
                          <p>Reyting: <span>0</span></p>
                        </div>
                        <p class="skill">
                          ' . $unvon . '
                        </p>
                      </div>
                      <div class="select-btn">
                        <button>Tanlash ' . $value['price'] . ' so\'mdan</button>
                      </div>
                    </div>
                    <div class="cart-footer">
                      <a href="#"
                        >' . $value['address'] . '</a
                      >
                    </div>
                  </div>
                </div>');
          }
          ?>
              </div>
            </div>
