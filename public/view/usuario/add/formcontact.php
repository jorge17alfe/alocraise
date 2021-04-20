 <form class="d-flex flex-column  btn-20 input-group-sm" id="information">
     <h3 class=""><?= get_string('index10') ?></h3>
     <p><?= get_string('index10.1') ?></p>
     <div class="respuestainformation  w-100 rounded text-center mb-2" style="background-color: var(--color_second);"></div>
     <input class="form-control mb-2 input-sm" id="email1" name="msg[email]" type="email" placeholder="Ingrese su e-mail..." required />
     <input class="form-control mb-2 input-sm" id="name1" name="msg[name]" type="text" placeholder="Ingrese su nombre..." />
     <input class="form-control mb-2 input-sm" id="asunto" name="msg[affair]" type="text" placeholder="Asunto..." required>
     <textarea class="form-control  mb-4 input-sm" name="msg[content]" id="" rows="5" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
     <button class="btn btn-sm btn-outline-primary mx-auto  px-5" type="submit" name="enviar_email"><?= get_string('btn-send') ?></button>
 </form>