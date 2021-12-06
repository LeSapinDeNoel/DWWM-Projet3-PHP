{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>
  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr>
  </div>

  <div class="conteneur_critic">

    <form action="#" method="post" enctype="multipart/form-data">

      <div id="image_critic">

        <label for="fileToUpload">
          <div class="profile-pic-critic" style="background-image: url('https://fakeimg.pl/150x150/')">
            <span></span>
            <span>Modifier votre image</span>
          </div>
        </label>

        <input type="File" name="fileToUpload" id="fileToUpload">

      </div>


        <div class="form-group ">
          <label for="title">Titre</label>
          <input id="title" type="text">
        </div>

        <div class="form-group">
          <label for="cat">Catégorie</label>
          <input id="cat" type="text">
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <textarea id="content" name="content"
          rows="5" cols="50">
          </textarea>
        </div>

      </div>

      <div class="button-container">
        <button class="button mb-5 mr-5">Créer ma Critique</button>
      </div>
    </form>


</main>

{/block}
