{extends file="layout/content.tpl"}
{block name=title append}{$title}{/block}
{block name="content"}

<main>

  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr />
  </div>

  <div class="row" style="margin-right: 0; margin-left: 5px;">
    <div class="col-md-12">

      {$form_open}
      <table id="admin" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>E-mail</th>
            <th>Role</th>
          </tr>
        </thead>
        <tbody>

          {foreach from=$arrUsersInfo item=$objUserInfo}
            <tr>
              <td><a href="{base_url('user/user_delete')}?use={$objUserInfo->user_id}" class="DeleteCritic"><i class="fas fa-minus-square"></i></a>&nbsp;{$objUserInfo->user_name}</td>
              <td>{$objUserInfo->user_firstname}</td>
              <td>{$objUserInfo->user_mail}</td>

              <td>
                {$label_cat}
                <select name="role{$objUserInfo->user_id}" id="role{$objUserInfo->user_id}">
                    <option
                    {if $objUserInfo->user_role == 1}
                      selected
                    {/if}
                    value="1">Administrateur</option>
                    <option
                    {if $objUserInfo->user_role == 2}
                      selected
                    {/if}
                    value="2">Modérateur</option>
                    <option
                    {if $objUserInfo->user_role == 3}
                      selected
                    {/if}
                    value="3">Utilisateur</option>
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

{* {/block}

{block name="js_footer"} *}


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
