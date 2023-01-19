
          <div class="right-bottom">
            <div class="right-body">
              <div class="body-top">
                <h2>Klinikalar</h2>
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
                $fetch = Functions::getbytable("clinic",'type=:cl',array("cl"=>"clinic"));
                              $no=0;
                              foreach($fetch as $value) {

                                  $no++;
                                  $found = 0;
                                  $kat='';
                                  $fetch1=Functions::getbytable("kat_clin",'clinic_id=:cl',array("cl"=>$value['id']));
                                  foreach ($fetch1 as $value1){
                                      $fetch2=Functions::getbyid('kat',$value1['kat_id']);
                                      foreach ($fetch2 as $value2){
                                          $kat.='<button>'.$value2['name'].'</button>';
                                      }
                                  }

                                  echo('<div class="body-middle">
                                <div class="middle-left">
                                  <div class="image-container">
                                    <img src="/files/images/image/' . $value['image'] . '" alt="' . $value['name'] . '" />
                                  </div>
                                  <div class="icons">
                                    <div>
                                      <i class="fa-solid fa-heart"></i>
                                    </div>
                                    <div>
                                      <i class="fa-solid fa-share-nodes"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="middle-right">
                                  <div class="cart-title">
                                    <h2><a href="/single-clinic/'.clean($value['name']).'/'.$keyuser.$value['id'].$keyuser.'">' . $value['name'] . '</a></h2>
                                    <p>' . $value['direction'] . '</p>
                                      
                                  </div>
                                  <div class="cart-title">
                                    '.$kat.'
                                  </div>
                                  <div class="cart-btns">
                                    <button>Qabul ' . $value['price'] . ' so`mdan</button>
                                    
                                  </div>
                                  <div class="contact">
                                    <div>
                                      <div>
                                        <i class="fa-solid fa-location-dot"></i>
                                        <a href="#">' . $value['address'] . '</a>
                                      </div>
                                      <div>
                                        <i class="fa-solid fa-phone"></i>
                                        <a href="tel:' . $value['phone'] . '"
                                          >' . $value['phone'] . '</a
                                        >
                                      </div>
                                    </div>
                                    <div>
                                      <div>
                                        <i class="fa-brands fa-telegram"></i>
                                        <a href="https://t.me/' . $value['telegram'] . '">@' . $value['telegram'] . '</a>
                                      </div>
                                      <div>
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:' . $value['email'] . '">' . $value['email'] . '</a>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                        ');
                        if ($no==1){
                            echo ('
                            <div class="body-ads"><h2>Reklama uchun joy...</h2>

              </div>
                            ');
                        }
                      }
                ?>



            </div>

