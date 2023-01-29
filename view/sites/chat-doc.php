
          <div class="right-bottom">
            <div class="right-body">
              <div class="body-top">
                <h2>Vakansiyalar</h2>
              </div>


          <?php
          $fetch = Functions::getall("vacancy");
          $no=0;
          foreach($fetch as $value) {

              $no++;
              $found = 0;

              $vilo="";
              $fetch1=Functions::getbyid("viloyat",$value['countryid']);
              foreach ($fetch1 as $value1){
                  $vilo=$value1['name'];
              }
              echo('
              <div class="body-middle">
                <div class="middle-left-vacancy">
                  <h2>' . $value['title'] . ' (' . $vilo . ')</h2>
                  <div class="requirement">
                    <p>Talablar:</p>
                    <span
                      >' . $value['requirements'] . '</span
                    >
                  </div>
                  <div class="working-schedule">
                    <p>Ish grafigi:</p>
                    <span>' . $value['worktime'] . '</span>
                  </div>
                  <div class="salary">
                    <p>Ish haqi:</p>
                    <span>' . $value['salary'] . '</span>
                  </div>
                  <div class="phone">
                    <p>Bog\'lanish raqami:</p>
                    <a href="tel:' . $value['contact'] . '">' . $value['contact'] . '</a>
                  </div>
                </div>
              </div>
                ');
          }
          ?>


            </div>

