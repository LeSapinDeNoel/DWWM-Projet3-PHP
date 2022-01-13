{extends file="layout/content.tpl"}

{block name="content"}

<main>
  <div class="justify-content-center">
    <h1>Listes des critiques</h1>
    <hr>
  </div>

  <div class="row" style="margin-right: 0; margin-left: 5px;">
    <div class="col-md-12">

      {$form_open}
      <table id="admin" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Créateur</th>
            <th>Nom de la critique</th>
            <th>Date de création</th>
            <th>Visibilité</th>
          </tr>
        </thead> 
        <tbody>

          {foreach from=$arrCriticsInfo item=$objCriticInfo}

          <tr>
            <td>{$objCriticInfo->user_name}&nbsp;{$objCriticInfo->user_firstname}</td>
            <td>{$objCriticInfo->critic_title}</td>
            <td>{$objCriticInfo->critic_createdate}</td>
            <td>
              {$label_visi}
              <select name="visibilite{$objCriticInfo->critic_id}" id="visibilite{$objCriticInfo->critic_id}">
                <option 
                {if $objCriticInfo->critic_status == 1}
                  selected
                {/if} 
                value="1">Publié</option>
                <option 
                {if $objCriticInfo->critic_status == 2}
                  selected
                {/if}
                value="2">En attente</option>
                <option 
                {if $objCriticInfo->critic_status == 3}
                  selected
                {/if}
                value="3">Non publié</option>       
              </select>
            </td>
          </tr>

          {/foreach}

        </tbody>
        <tfoot>
          <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>E-mail</th>
            <th>Role</th>
          </tr>
        </tfoot>
      </table>
      {$form_submit}
      {$form_close}

    </div>
  </div>

</main>

{literal}
    <script> 
      $(document).ready(function() {
        $('#admin').DataTable({
          language: {
              url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json'
          }
        });
      });
    </script>
  {/literal}

{/block}
