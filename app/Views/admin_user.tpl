{extends file="layout/content.tpl"}
{block name="content"}

<main>

  <div class="justify-content-center">
    <h1>{$title}</h1>
    <hr />
  </div>

  <div class="row" style="margin-right: 0; margin-left: 5px;">
    <div class="col-md-12">

      {$form_open}      
      <table id="admin" class=" table table-bordered table-hover dt-responsive" style="width:100%">
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
                  <td>{$objUserInfo->user_name}</td>
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
          
      </table>
      {$form_submit}
      {$form_close}

    </div>
  </div>
  
  

</main>

{/block}

{block name="js_footer"}

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  {* <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.jqueryui.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.jqueryui.min.js"></script> *}

  <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.11.3/r-2.2.9/datatables.min.js"></script>

  {literal}
    <script> 
      $(document).ready(function() {
        $('#admin').DataTable({
          language: {
              url: 'dataTables.french.json'
          }
        });
      });
    </script>
  {/literal}

{/block}