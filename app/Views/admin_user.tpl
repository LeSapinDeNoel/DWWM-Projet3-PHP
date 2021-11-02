{extends file="layout/content.tpl"}
{block name="content"}

<main>

  <div class="justify-content-center">
    <h1>Listes des utilisateurs</h1>
    <hr />
  </div>

  <div class="row" style="margin-right: 0; margin-left: 5px;">
    <div class="col-md-12">

      {* <table class="table table-reflow"> *}
      <table id="admin" class=" table table-bordered table-hover dt-responsive" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>E-mail</th>
            <th>Role</th>
          </tr>
        </thead> 
            <tbody>
              <tr>
                <td>1</td>
                <td>Felbinger</td>
                <td>Quentin</td>
                <td>quentin.felbinger@gmail.com</td>
                <td>administrateur</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Dienger</td>
                <td>Julie</td>
                <td>julie.dienger@gmail.com</td>
                <td>moderateur</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Antoine</td>
                <td>Yoan</td>
                <td>yoan.antoine@gmail.com</td>
                <td>utilisateur</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Adam</td>
                <td>Francis</td>
                <td>francis.adam@gmail.com</td>
                <td>utilisateur</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Thomas</td>
                <td>Meg</td>
                <td>meg.thomas@gmail.com</td>
                <td>moderateur</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Dwight</td>
                <td>Fairfield</td>
                <td>fairfield.dwight@gmail.com</td>
                <td>administrateur</td>
              </tr>
            </tbody>
          
      </table>
    </div>
  </div>

</main>

{/block}

{block name="js_footer"}

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.jqueryui.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.jqueryui.min.js"></script>

  {literal}
    <script> 
      $('table').DataTable({
        language: {
            url: 'dataTables.french.json'
        }
      });
    </script>
  {/literal}

{/block}