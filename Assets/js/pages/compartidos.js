document.addEventListener("DOMContentLoaded", function () {
    const compartidos = document.querySelectorAll(".compartidos");
    compartidos.forEach((row) => {
      row.addEventListener("click", function (e) {
        let id_detalle = this.getAttribute("id");
        verDetalle(id_detalle);
      });
    });
  });
  
  function verDetalle(id_detalle) {
    const http = new XMLHttpRequest();
    const url = base_url + "compartidos/verDetalle/" + id_detalle;
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        let html = `<span class="mailbox-open-date">${res.fecha}</span>
                                <h5 class="mailbox-open-title">
                                   Work together with better collaboration tools
                                </h5>
                                <div class="mailbox-open-author">
                                   <img src="${base_url + 'Assets/images/logo.png'}" alt="">
                                   <div class="mailbox-open-author-info">
                                      <span class="mailbox-open-author-info-email d-block">${res.correo}</span>
                                      <span class="mailbox-open-author-info-to">To <span class="badge badge-info align-self-center">devs</span></span>
                                   </div>
                                   <div class="mailbox-open-actions">
                                      <a href="#" class="btn btn-primary">Forward</a>
                                      <a href="#" class="btn btn-danger">Delete</a>
                                   </div>
                                </div>
                                <div class="mailbox-open-content-email">
                                   <p>Vestibulum vitae maximus nisi. Cras vitae ligula metus. Nulla quis tortor at felis volutpat tempus ac vel quam. Sed eget nibh tortor. Phasellus sit amet pharetra justo, fringilla pellentesque nibh. Donec euismod metus nec neque hendrerit, sit amet ornare libero ultrices. Vestibulum non massa a massa ultrices consectetur. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam gravida rhoncus enim, non eleifend purus malesuada eget. Nunc vitae pretium augue. Duis non nisi quis enim accumsan consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae bibendum turpis, eu feugiat enim. Aliquam quis mauris eget ipsum faucibus mollis ut tincidunt libero.
                                   </p>
                                   <div class="mailbox-open-content-email-attachments">
                                      <ul class="attachments-files-list list-unstyled">
                                         <li class="attachments-files-list-item">
                                            <span class="attachments-files-list-item-icon">
                                            <i class="material-icons-outlined">insert_drive_file</i>
                                            </span>
                                            <span class="attachments-files-list-item-content">
                                            <span class="attachments-files-list-item-title">Invoice.pdf</span>
                                            <span class="attachments-files-list-item-size">14 MB</span>
                                            </span>
                                            <a href="${base_url + 'Assets/archivos/' + res.id_carpeta + '/' + res.nombre}" download class="attachments-files-list-item-download-btn">
                                            <i class="material-icons-outlined">
                                            download
                                            </i>
                                            </a>
                                         </li>
                                      </ul>
                                   </div>
                                </div>
                                <div class="mailbox-open-content-reply">
                                   <div id="reply-editor"></div>
                                </div>`;
                              document.querySelector('#content-info').innerHTML = html;
      }
    };
  }
  