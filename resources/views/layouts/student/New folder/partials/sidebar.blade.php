            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
                <div class="container-xxl d-flex h-100">
                  <ul class="menu-inner">
                    <!-- Dashboards -->
                    <li class="menu-item active">
                      <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboards">Dashboards</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item active">
                          <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                            <div data-i18n="Analytics">Analytics</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="dashboards-crm.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                            <div data-i18n="CRM">CRM</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="dashboards-ecommerce.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-atom-2"></i>
                            <div data-i18n="eCommerce">eCommerce</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <!-- Layouts -->
                    <li class="menu-item">
                      <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                        <div data-i18n="Layouts">Layouts</div>
                      </a>

                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="layouts-without-menu.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-menu-2"></i>
                            <div data-i18n="Without menu">Without menu</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="../vertical-menu-template/" class="menu-link" target="_blank">
                            <i class="menu-icon tf-icons ti ti-layout-distribute-vertical"></i>
                            <div data-i18n="Vertical">Vertical</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="layouts-fluid.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-maximize"></i>
                            <div data-i18n="Fluid">Fluid</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="layouts-container.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-arrows-maximize"></i>
                            <div data-i18n="Container">Container</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="layouts-blank.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-square"></i>
                            <div data-i18n="Blank">Blank</div>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <!-- Apps -->
                    <li class="menu-item">
                      <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                        <div>Apps</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="{{ route('message.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-mail"></i>
                            <div >Message</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="{{ route('chat.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-messages"></i>
                            <div>Chat</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-calendar.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <div data-i18n="Calendar">Calendar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="app-kanban.html" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                            <div data-i18n="Kanban">Kanban</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                            <div data-i18n="Invoice">Invoice</div>
                          </a>
                          <ul class="menu-sub">
                            <li class="menu-item">
                              <a href="app-invoice-list.html" class="menu-link">
                                <div data-i18n="List">List</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a href="app-invoice-preview.html" class="menu-link">
                                <div data-i18n="Preview">Preview</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a href="app-invoice-edit.html" class="menu-link">
                                <div data-i18n="Edit">Edit</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a href="app-invoice-add.html" class="menu-link">
                                <div data-i18n="Add">Add</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Users">Users</div>
                          </a>
                          <ul class="menu-sub">
                            <li class="menu-item">
                              <a href="app-user-list.html" class="menu-link">
                                <div data-i18n="List">List</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <div data-i18n="View">View</div>
                              </a>
                              <ul class="menu-sub">
                                <li class="menu-item">
                                  <a href="app-user-view-account.html" class="menu-link">
                                    <div data-i18n="Account">Account</div>
                                  </a>
                                </li>
                                <li class="menu-item">
                                  <a href="app-user-view-security.html" class="menu-link">
                                    <div data-i18n="Security">Security</div>
                                  </a>
                                </li>
                                <li class="menu-item">
                                  <a href="app-user-view-billing.html" class="menu-link">
                                    <div data-i18n="Billing & Plans">Billing & Plans</div>
                                  </a>
                                </li>
                                <li class="menu-item">
                                  <a href="app-user-view-notifications.html" class="menu-link">
                                    <div data-i18n="Notifications">Notifications</div>
                                  </a>
                                </li>
                                <li class="menu-item">
                                  <a href="app-user-view-connections.html" class="menu-link">
                                    <div data-i18n="Connections">Connections</div>
                                  </a>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Roles & Permissions">Roles & Permission</div>
                          </a>
                          <ul class="menu-sub">
                            <li class="menu-item">
                              <a href="app-access-roles.html" class="menu-link">
                                <div data-i18n="Roles">Roles</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a href="app-access-permission.html" class="menu-link">
                                <div data-i18n="Permission">Permission</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>

                    <!-- Misc -->
                    <li class="menu-item">
                      <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-box-multiple"></i>
                        <div data-i18n="Misc">Misc</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="https://pixinvent.ticksy.com/" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                            <div data-i18n="Support">Support</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a
                            href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                            target="_blank"
                            class="menu-link"
                          >
                            <i class="menu-icon tf-icons ti ti-file-description"></i>
                            <div data-i18n="Documentation">Documentation</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </aside>
              <!-- / Menu -->
