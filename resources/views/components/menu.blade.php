<nav class="mt-2 blanc gras  redressed">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Tableau de bord
              </p>
            </a>
          </li> -->

        {{-- @can("manager")
             <li class="nav-item {{ setMenuClass('manager.generale.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('manager.generale.', 'active') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                href="{{ route('manager.generale.vue') }}"
                class="nav-link {{ setMenuActive('manager.generale.vue') }}"
                >
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Vue globale</p>
                </a>
              </li>
            </ul>
        </li>
        @endcan --}}
        
    

        @can("admin")
          <li class="nav-item {{ setMenuClass('admin.compte.', 'menu-open') }}">
              <a href="#" class="nav-link {{ setMenuClass('admin.compte.', 'active') }}">
                <i class=" nav-icon fas fa-user-shield"></i>
                <p>
                  Comptes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                   <a
                href="{{ route('admin.compte.users.index') }}"
                class="nav-link {{ setMenuActive('admin.compte.users.index') }}"
                >
                    <i class=" nav-icon fas fa-users-cog"></i>
                    <p>Users</p>
                  </a>
                </li>
            
              </ul>
          </li>

          <li class="nav-item {{ setMenuClass('admin.parametrages.', 'menu-open') }}">
              <a
                href="#" class="nav-link {{ setMenuClass('admin.parametrages.', 'active') }} " >
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                  Parametrage
                  <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('admin.parametrages.contenus') }}"
                       class="nav-link {{ setMenuActive('admin.parametrages.contenus') }}"
                      >
                      <i class="nav-icon fas fa-list-ul"></i>
                      <p>Les contenus</p>
                      </a>
                  </li>
                 <li class="nav-item ">
                    <a
                  href="{{ route('admin.parametrages.services')}}"
                  class="nav-link {{ setMenuActive('admin.parametrages.services')}}"
                  >
                      <i class=" nav-icon  fas fa-list-ul"></i>
                      <p>Les services</p>
                    </a>
                </li>
                   
                  <li class="nav-item">
                    <a href="{{ route('admin.parametrages.filiales') }}"
                      class="nav-link {{ setMenuActive('admin.parametrages.filiales') }}"
                     >
                     <i class="nav-icon fas fa-list-ul"></i>
                     <p>Les filiales</p>
                     </a>
                 </li>
                 <li class="nav-item">
                  <a href="{{ route('admin.parametrages.atouts') }}"
                    class="nav-link {{ setMenuActive('admin.parametrages.atouts') }}"
                   >
                   <i class="nav-icon fas fa-list-ul"></i>
                   <p>Les atouts</p>
                   </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('admin.parametrages.clients') }}"
                  class="nav-link {{ setMenuActive('admin.parametrages.clients') }}"
                 >
                 <i class="nav-icon fas fa-list-ul"></i>
                 <p>Les clients</p>
                 </a>
             </li>
             <li class="nav-item">
              <a href="{{ route('admin.parametrages.competences') }}"
                class="nav-link {{ setMenuActive('admin.parametrages.competences') }}"
               >
               <i class="nav-icon fas fa-list-ul"></i>
               <p>Les Competences</p>
               </a>
           </li>
              </ul>
          </li>
          <li class="nav-item {{ setMenuClass('admin.carriere.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.carriere.', 'active') }}">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Carrière
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a
               href="{{ route('admin.carriere.categories')}}"
               class="nav-link {{ setMenuActive('admin.carriere.categories')}}"
               >
                 <i class=" nav-icon fas fa-users"></i>
                 <p>Domaines</p>
               </a>
             </li>

              <li class="nav-item ">
                 <a
              href="{{ route('admin.carriere.posts') }}"
              class="nav-link {{ setMenuActive('admin.carriere.posts') }}"
              >
                  <i class=" nav-icon fas fa-users"></i>
                  <p>Profils</p>
                </a>
              </li>
          
              
              <li class="nav-item ">
                <a
               href="{{ route('admin.carriere.candidats')}}"
               class="nav-link {{ setMenuActive('admin.carriere.candidats')}}"
               >
                 <i class=" nav-icon fas fa-users"></i>
                 <p>Candidature</p>
               </a>
             </li>
              
          
            </ul>
        </li>
          <li class="nav-item {{ setMenuClass('admin.contact.', 'menu-open') }}">
              <a href="#" class="nav-link {{ setMenuClass('admin.contact.', 'active') }}">
                <i class=" nav-icon fas fa-user-shield"></i>
                <p>
                  Abonnés
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                   <a
                href="{{ route('admin.contact.contact') }}"
                class="nav-link {{ setMenuActive('admin.contact.contact') }}"
                >
                    <i class=" nav-icon fas fa-users"></i>
                    <p>Contacts</p>
                  </a>
                </li>
                <li class="nav-item ">
                   <a
                href="{{ route('admin.contact.newletter') }}"
                class="nav-link {{ setMenuActive('admin.contact.newletter') }}"
                >
                    <i class=" nav-icon fas fa-users"></i>
                    <p>Newletters</p>
                  </a>
                </li>            
              </ul>
          </li>
          {{-- <li class="nav-item menu-open ">
              <a href="#" class="nav-link active">
                <i class=" nav-icon far fa-edit"></i>
                <p>
                  Gesttion des pages
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                   <a href="{{ route('admin.update.accueil') }}"
                    class="nav-link {{ setMenuActive('admin.update.accueil') }} ">
                    <i class=" nav-icon far fa-edit"></i>
                    <p>Accueil</p>
                  </a>
                </li>
                <li class="nav-item ">
                   <a href="{{ route('admin.update.about') }}"
                    class="nav-link {{ setMenuActive('admin.update.about') }} ">
                    <i class=" nav-icon far fa-edit"></i>
                    <p> Présentation</p>
                  </a>
                </li>
                <li class="nav-item ">
                   <a href="{{ route('admin.update.atout') }}"
                    class="nav-link {{ setMenuActive('admin.update.atout') }} ">
                    <i class=" nav-icon far fa-edit"></i>
                    <p>Atouts</p>
                  </a>
                </li>
                <li class="nav-item ">
                   <a href="{{ route('admin.update.service') }}"
                    class="nav-link {{ setMenuActive('admin.update.service') }} ">
                    <i class=" nav-icon far fa-edit"></i>
                    <p>Services</p>
                  </a>
                </li>
                
                <li class="nav-item ">
                   <a href="{{ route('admin.update.client') }}"
                    class="nav-link {{ setMenuActive('admin.update.client') }} ">
                    <i class=" nav-icon far fa-edit"></i>
                    <p>Clients</p>
                  </a>
                </li>
                <li class="nav-item ">
                <a href="{{ route('admin.update.carriere') }}"
                    class="nav-link {{ setMenuActive('admin.update.carriere') }} ">
                    <i class="nav-icon far fa-edit"></i>
                    <p>Carrière</p>
                  </a>
                </li>
                <li class="nav-item ">
                <a href="{{ route('admin.update.contact') }}"
                    class="nav-link {{ setMenuActive('admin.update.contact') }} ">
                    <i class="nav-icon far fa-edit"></i>
                    <p>Contact</p>
                  </a>
                </li>
            
              </ul>
          </li> --}}
        @endcan
      </ul>
</nav>
