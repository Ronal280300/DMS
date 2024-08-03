<?php include_once 'Views/template/header.php'?>
<div class="container">
   <div class="row">
      <div class="col">
         <div class="page-description page-description-tabbed">
            <h1>
               <?php echo $data ['title']; ?>
               <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="hoaccountme" aria-selected="true">Datos</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Credenciales</button>
                  </li>
               </ul>
            </h1>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-6">
                           <label for="settingsInputEmail" class="form-label">Email address</label>
                           <input type="email" class="form-control" id="settingsInputEmail" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                           <div id="settingsEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="col-md-6">
                           <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                           <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="(xxx) xxx-xxxx">
                        </div>
                     </div>
                     <div class="row m-t-lg">
                        <div class="col-md-6">
                           <label for="settingsInputFirstName" class="form-label">First Name</label>
                           <input type="text" class="form-control" id="settingsInputFirstName" placeholder="John">
                        </div>
                        <div class="col-md-6">
                           <label for="settingsInputLastName" class="form-label">Last Name</label>
                           <input type="text" class="form-control" id="settingsInputLastName" placeholder="Doe">
                        </div>
                     </div>
                     <div class="row m-t-lg">
                        <div class="col-md-6">
                           <label for="settingsInputUserName" class="form-label">Username</label>
                           <div class="input-group">
                              <span class="input-group-text" id="settingsInputUserName-add">neptune.com/</span>
                              <input type="text" class="form-control" id="settingsInputUserName" aria-describedby="settingsInputUserName-add" placeholder="username">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <label for="settingsState" class="form-label">State</label>
                           <select class="js-states form-control" id="settingsState" tabindex="-1" style="display: none; width: 100%">
                              <optgroup label="Alaskan/Hawaiian Time Zone">
                                 <option value="AK">Alaska</option>
                                 <option value="HI">Hawaii</option>
                              </optgroup>
                              <optgroup label="Pacific Time Zone">
                                 <option value="CA">California</option>
                                 <option value="NV">Nevada</option>
                                 <option value="OR">Oregon</option>
                                 <option value="WA">Washington</option>
                              </optgroup>
                              <optgroup label="Mountain Time Zone">
                                 <option value="AZ">Arizona</option>
                                 <option value="CO">Colorado</option>
                                 <option value="ID">Idaho</option>
                                 <option value="MT">Montana</option>
                                 <option value="NE">Nebraska</option>
                                 <option value="NM">New Mexico</option>
                                 <option value="ND">North Dakota</option>
                                 <option value="UT">Utah</option>
                                 <option value="WY">Wyoming</option>
                              </optgroup>
                              <optgroup label="Central Time Zone">
                                 <option value="AL">Alabama</option>
                                 <option value="AR">Arkansas</option>
                                 <option value="IL">Illinois</option>
                                 <option value="IA">Iowa</option>
                                 <option value="KS">Kansas</option>
                                 <option value="KY">Kentucky</option>
                                 <option value="LA">Louisiana</option>
                                 <option value="MN">Minnesota</option>
                                 <option value="MS">Mississippi</option>
                                 <option value="MO">Missouri</option>
                                 <option value="OK">Oklahoma</option>
                                 <option value="SD">South Dakota</option>
                                 <option value="TX">Texas</option>
                                 <option value="TN">Tennessee</option>
                                 <option value="WI">Wisconsin</option>
                              </optgroup>
                              <optgroup label="Eastern Time Zone">
                                 <option value="CT">Connecticut</option>
                                 <option value="DE">Delaware</option>
                                 <option value="FL">Florida</option>
                                 <option value="GA">Georgia</option>
                                 <option value="IN">Indiana</option>
                                 <option value="ME">Maine</option>
                                 <option value="MD">Maryland</option>
                                 <option value="MA">Massachusetts</option>
                                 <option value="MI">Michigan</option>
                                 <option value="NH">New Hampshire</option>
                                 <option value="NJ">New Jersey</option>
                                 <option value="NY">New York</option>
                                 <option value="NC">North Carolina</option>
                                 <option value="OH">Ohio</option>
                                 <option value="PA">Pennsylvania</option>
                                 <option value="RI">Rhode Island</option>
                                 <option value="SC">South Carolina</option>
                                 <option value="VT">Vermont</option>
                                 <option value="VA">Virginia</option>
                                 <option value="WV">West Virginia</option>
                              </optgroup>
                           </select>
                        </div>
                     </div>
                     <div class="row m-t-lg">
                        <div class="col">
                           <label for="settingsAbout" class="form-label">About</label>
                           <textarea class="form-control" id="settingsAbout" maxlength="500" rows="4" aria-describedby="settingsAboutHelp"></textarea>
                           <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div>
                        </div>
                     </div>
                     <div class="row m-t-lg">
                        <div class="col">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="SettingsNewsLetter">
                              <label class="form-check-label" for="SettingsNewsLetter">
                              Receive notifications about updates &amp; maintenances
                              </label>
                           </div>
                           <a href="#" class="btn btn-primary m-t-sm">Update</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
               <form id="frmPass">
               <div class="card">
                  <div class="card-body">
                     <div class="row m-t-xxl">
                        <div class="col-md-6">
                           <label for="settingsCurrentPassword" class="form-label" >Contraseña actual</label>
                           <input type="password" id="clave_actual" name="clave_actual" class="form-control" placeholder="Contraseña actual">
                        </div>
                     </div>
                     <div class="row m-t-xxl">
                        <div class="col-md-6">
                           <label for="settingsNewPassword" class="form-label">Nueva contraseña</label>
                           <input type="password" id="clave_nueva" name="clave_nueva" class="form-control" placeholder="Nueva contraseña">
                        </div>
                     </div>
                     <div class="row m-t-xxl">
                        <div class="col-md-6">
                           <label for="settingsConfirmPassword" class="form-label" >Confirmar contraseña</label>
                           <input type="password" id="clave_confirmar" name="clave_confirmar" class="form-control" placeholder="Confirmar contraseña">
                        </div>
                     </div>
                     <div class="row m-t-lg">
                        <div class="col">
                           <button type="submit" class="btn btn-primary m-t-sm">Cambiar contraseña</button>
                        </div>
                     </div>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once 'Views/template/footer.php'?>