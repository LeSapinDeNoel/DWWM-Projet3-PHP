{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>
  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr>
  </div>

  <div class="conteneur_critic">
    {if isset($validation)}
        <div class="alert alert-danger">
            {$validation->listErrors()}
        </div>
    {/if}
    {$form_open}
      <div id="image_critic">

        <label for="fileToUpload">
          <div class="profile-pic-critic" style="background-image: url('https://fakeimg.pl/150x150/')">
            <span></span>
            <span>Modifier votre image</span>
          </div>
        </label>

        {$form_img}
      </div>


        <div class="form-group ">
          {$label_title}
          {$form_title}
        </div>

        <div class="form-group">
          {$label_cat}
          {$form_cat}
        </div>


        <div class="form-group">
          {$label_content}
          {$form_content}
        </div>

      </div>

      <div class="button-container">
      {$form_submit}
      </div>
    {$form_close}


</main>

{/block}
