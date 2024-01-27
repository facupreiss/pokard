<section id="contactoSection">
  <div class="container">
    <h2 class="text-center mb-5">Contacto</h2>
    <form action="https://formsubmit.co/lucas.emens@davinci.edu.ar" method="POST" onsubmit="setFormSubmitted()">
      <div class="row">
        <div class="col-12 col-lg-6">
          <label for="fullName">Nombre</label>
          <input class="formInput p-2" type="text" name="fullName" id="fullName" required />
        </div>
        <div class="col-12 col-lg-6">
          <label for="email">Email</label>
          <input class="formInput p-2" type="email" name="email" id="email" required />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label for="message">Mensaje</label>
          <textarea class="formInput p-2" name="message" id="message"></textarea>
        </div>
      </div>
      <input type="hidden" name="formSubmitted" value="true" />
      <div class="row">
        <div class="col-12">
          <button class="btnSubmit" type="submit">Enviar</button>
        </div>
      </div>
      <input type="hidden" name="_captcha" value="false" />
      <input type="text" name="_honey" style="display: none" />
    </form>
  </div>
</section>