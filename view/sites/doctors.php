
          <div class="right-bottom">
            <div class="right-body">
              <div class="body-top">
                <h2>Shifokorlar</h2>
                <p>
                  <select class="minimal">
                    <option>-- Tanlang --</option>
                    <option>Toshkent viloyati</option>
                    <option>Samarqand viloyati</option>
                    <option>Farg'ona viloyati</option>
                    <option>Andijon viloyati</option>
                    <option>Qashqadaryo viloyati</option>
                    <option>Jizzax viloyati</option>
                    <option>Namangan viloyati</option>
                    <option>Buxoro viloyati</option>
                    <option>Navoiy viloyati</option>
                    <option>Surxondaryo viloyati</option>
                    <option>Sirdayro viloyati</option>
                    <option>Xorazm viloyati</option>
                    <option>Qoraqalpog'iston Respublikasi</option>
                  </select>
                  <img src="/assets/images/filter.png" alt="filter" />
                </p>
              </div>

          <?php
          $fetch = Functions::getall("doctor");
          $no=0;
          foreach($fetch as $value) {

              $no++;
              $found = 0;
              $rank="";
              $fetch1=Functions::getbyid("rank",$value['rankid']);
              foreach ($fetch1 as $value1){
                  $rank=$value1['name'];
              }
              $clinic="";
              $fetch2=Functions::getbyid("clinic",$value['clinicid']);
              foreach ($fetch2 as $value2){
                  $clinic=$value2['name'];
              }

              echo('
              <div class="doctor-middle">
                <div class="doctor-cart">
                  <i class="fa-regular fa-heart empty-heart"></i>
                  <i class="fa-solid fa-heart full-heart hidden"></i>
                  <div class="image-container">
                    <img src="/files/images/doctor/'.$value['doctor'].'" alt="'.$value['fullname'].'" />
                  </div>
                  <div class="doctor-data">
                    <h2><a href="/single-doctor/'.clean($value['fullname']).'/'.$keyuser.$value['id'].$keyuser.'">'.$value['fullname'].'</a></h2>
                    <p class="skill">'.$rank.'</p>
                    <p class="experience">
                      <span>'.$clinic.'</span
                      ><span>Tajribasi - '.$value['experiment'].' yil</span>
                    </p>
                    <div>
                      <span>Reyting: </span>
                      <img src="/assets/images/star.png" alt="star" />
                      <img src="/assets/images/star.png" alt="star" />
                      <img src="/assets/images/star.png" alt="star" />
                      <img src="/assets/images/star.png" alt="star" />
                      <img src="/assets/images/half-star.png" alt="half star" />
                    </div>
                    <div class="icons">
                      <ul>
                        <li>
                          <a href="tel:'.$value['phone'].'"
                            ><i class="fa-solid fa-phone"></i
                          ></a>
                        </li>
                        <li>
                          <a href="https://t.me/@'.$value['telegram'].'"
                            ><i class="fa-brands fa-telegram"></i
                          ></a>
                        </li>
                        <li>
                          <a href="mailto:'.$value['email'].'"
                            ><i class="fa-solid fa-envelope"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#"
                            ><i class="fa-solid fa-location-dot"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="doctor-about">
                    <p>
                      '.$value['about'].'
                    </p>
                    <button>Qabulga yozilish</button>
                  </div>
                </div>
              </div>');
          }
          ?>
            </div>
