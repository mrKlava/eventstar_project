<!-- TODO

- user registered on event handling
- ? carousel for gallery 
- ? map integration
 -->

<?php if (empty($event)) : ?>
  <h2>Event whit this id was not found</h2>
<?php else : ?>

  <main>

    <section class="container my-5">
      <div class="row mb-3 border rounded-3 px-3 py-3 mx-1">
        <div class="col-sm-8 mb-3">
          <p>Date: <?= $event["date"] ?></p>
          <?php if ($event["pers_max"]) : ?>
            <p>Places left: <?= $event["pers_max"] - $event['registrations'] ?></p>
          <?php endif ?>
          <p>City: <?= $event["city_name"] ?></p>
          <p>Location: <?= $event["location_name"] ?></p>
        </div>

        <div class="col-sm-4 d-flex justify-content-center align-items-center mb-3">
          <?php if ($event["age_limit"] != NULL) : ?>
            <p class="mb-3">This event has age limit: <?= $event["age_limit"] ?></p>
          <?php endif ?>

          <?php if (false) : ?>
            <button class="btn btn-primary">Register</button>
          <?php else : ?>
            <p class="text-success">You are registered on this event</p>
          <?php endif ?>
        </div>

        <hr class="my-3">
        <h5 class="mb-2">Details</h5>
        <p class="mb-3"><?= $event['description'] ?></p>
      </div>
    </section>

    <section class="container mb-5">
      <h3 class="title mb-3"> About event</h3>
      <p class="mb-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum culpa voluptate ea, dolor asperiores optio eos nam laudantium ad similique reprehenderit corrupti aliquam quis dolore! Voluptatum illo cumque at omnis? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus accusantium odio eveniet illo quo reprehenderit unde ipsa nobis molestiae ut quam tempore ullam ab, sit maxime aliquam ducimus voluptate quos. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos nobis amet voluptates tempora temporibus at sint ad labore perspiciatis, reiciendis nihil libero animi earum repudiandae quidem soluta quaerat! Sed, fugiat! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium laudantium corporis autem doloremque, doloribus hic quos eius sint quas? Ipsa hic quis provident dignissimos cum blanditiis velit voluptatem natus eum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis iusto at officia voluptates accusamus, accusantium incidunt fugiat, ut asperiores sunt sint soluta vitae repellendus enim! Aliquam reprehenderit aut omnis veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique minus at, possimus sequi repellendus voluptates fugiat ratione unde nesciunt sunt minima modi adipisci beatae illo nulla molestiae. Nemo atque reiciendis quia accusantium laborum doloremque beatae, impedit debitis, corporis iusto, ipsum ut quibusdam sit. Aperiam consequuntur cum, natus repudiandae alias voluptatem voluptas quis perspiciatis quod itaque debitis tenetur molestiae labore, sed autem ipsam ipsum illum culpa, porro perferendis! Cumque, accusamus nulla, culpa perspiciatis porro assumenda quisquam nihil molestias ab, iure saepe alias id. Quasi odio nesciunt harum vitae deleniti adipisci similique animi, aspernatur modi sed. Cumque numquam fugit itaque optio facilis?</p>
    </section>

    <div>
      <p class="container">Address: <?= $event["location_name"] ?> <?= $event["address"] ?> <?= $event["city_name"] ?></p>
      <div style="height:300px; background-color: green;">MAP</div>
    </div>

  </main>

<?php endif ?>