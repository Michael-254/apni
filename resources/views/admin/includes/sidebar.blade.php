<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">
                @if(!empty($generalSettings['site_name']))
                    {{ strtoupper($generalSettings['site_name']) }}
                @else
                    Platform Title
                @endif
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                @if(!empty($generalSettings['site_name']))
                    {{ strtoupper(substr($generalSettings['site_name'],0,2)) }}
                @endif
            </a>
        </div>

        <ul class="sidebar-menu">
            @can('admin_general_dashboard_show')
                <li class="{{ (request()->is('admin/')) ? 'active' : '' }}">
                    <a href="/admin" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span>{{ trans('admin/main.dashboard') }}</span>
                    </a>
                </li>
            @endcan

            @if($authUser->can('admin_webinars') or
                $authUser->can('admin_bundles') or
                $authUser->can('admin_categories') or
                $authUser->can('admin_filters') or
                $authUser->can('admin_quizzes') or
                $authUser->can('admin_certificate') or
                $authUser->can('admin_reviews_lists') or
                $authUser->can('admin_webinar_assignments') or
                $authUser->can('admin_enrollment')
            )
                <li class="menu-header">{{ trans('site.education') }}</li>
            @endif

            @can('admin_webinars')
                <li class="nav-item dropdown {{ (request()->is('admin/webinars*') and !request()->is('admin/webinars/comments*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span>{{ trans('panel.classes') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_webinars_list')
                            <li class="{{ (request()->is('admin/webinars') and request()->get('type') == 'course') ? 'active' : '' }}">
                                <a class="nav-link @if(!empty($sidebarBeeps['courses']) and $sidebarBeeps['courses']) beep beep-sidebar @endif" href="/admin/webinars?type=course">{{ trans('admin/main.courses') }}</a>
                            </li>

                            <li class="{{ (request()->is('admin/webinars') and request()->get('type') == 'text_lesson') ? 'active' : '' }}">
                                <a class="nav-link @if(!empty($sidebarBeeps['textLessons']) and $sidebarBeeps['textLessons']) beep beep-sidebar @endif" href="/admin/webinars?type=text_lesson">{{ trans('admin/main.text_courses') }}</a>
                            </li>
                        @endcan()

                        @can('admin_webinars_create')
                            <li class="{{ (request()->is('admin/webinars/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/webinars/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()

                    </ul>
                </li>
            @endcan()


            @can('admin_quizzes')
                <li class="{{ (request()->is('admin/quizzes*')) ? 'active' : '' }}">
                    <a class="nav-link " href="/admin/quizzes">
                        <i class="fas fa-file"></i>
                        <span>{{ trans('admin/main.quizzes') }}</span>
                    </a>
                </li>
            @endcan()

            @can('admin_certificate')
                <li class="nav-item dropdown {{ (request()->is('admin/certificates*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-certificate"></i>
                        <span>{{ trans('admin/main.certificates') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_certificate_list')
                            <li class="{{ (request()->is('admin/certificates')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/certificates">{{ trans('update.quizzes_related') }}</a>
                            </li>
                        @endcan

                        @can('admin_course_certificate_list')
                            <li class="{{ (request()->is('admin/certificates/course-competition')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/certificates/course-competition">{{ trans('update.course_certificates') }}</a>
                            </li>
                        @endcan

                        @can('admin_certificate_template_list')
                            <li class="{{ (request()->is('admin/certificates/templates')) ? 'active' : '' }}">
                                <a class="nav-link"
                                   href="/admin/certificates/templates">{{ trans('admin/main.certificates_templates') }}</a>
                            </li>
                        @endcan

                        @can('admin_certificate_template_create')
                            <li class="{{ (request()->is('admin/certificates/templates/new')) ? 'active' : '' }}">
                                <a class="nav-link"
                                   href="/admin/certificates/templates/new">{{ trans('admin/main.new_template') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_webinar_assignments')
                <li class="{{ (request()->is('admin/assignments')) ? 'active' : '' }}">
                    <a href="/admin/assignments" class="nav-link">
                        <i class="fas fa-pen"></i>
                        <span>{{ trans('update.assignments') }}</span>
                    </a>
                </li>
            @endcan

            @can('admin_course_question_forum_list')
                <li class="{{ (request()->is('admin/webinars/course_forums')) ? 'active' : '' }}">
                    <a class="nav-link " href="/admin/webinars/course_forums">
                        <i class="fas fa-comment-alt"></i>
                        <span>{{ trans('update.course_forum') }}</span>
                    </a>
                </li>
            @endcan()

            @can('admin_course_noticeboards_list')
                <li class="nav-item dropdown {{ (request()->is('admin/course-noticeboards*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-clipboard-check"></i>
                        <span>{{ trans('update.course_notices') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_course_noticeboards_list')
                            <li class="{{ (request()->is('admin/course-noticeboards')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/course-noticeboards">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan

                        @can('admin_course_noticeboards_send')
                            <li class="{{ (request()->is('admin/course-noticeboards/send')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/course-noticeboards/send">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_enrollment')
                <li class="nav-item dropdown {{ (request()->is('admin/enrollments*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-plus"></i>
                        <span>{{ trans('update.enrollment') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_enrollment_history')
                            <li class="{{ (request()->is('admin/enrollments/history')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/enrollments/history">{{ trans('public.history') }}</a>
                            </li>
                        @endcan

                        @can('admin_enrollment_add_student_to_items')
                            <li class="{{ (request()->is('admin/enrollments/add-student-to-class')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/enrollments/add-student-to-class">{{ trans('update.add_student_to_a_class') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_categories')
                <li class="nav-item dropdown {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-th"></i>
                        <span>{{ trans('admin/main.categories') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_categories_list')
                            <li class="{{ (request()->is('admin/categories')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/categories">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_categories_create')
                            <li class="{{ (request()->is('admin/categories/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/categories/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                        @can('admin_trending_categories')
                            <li class="{{ (request()->is('admin/categories/trends')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/categories/trends">{{ trans('admin/main.trends') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @can('admin_filters')
                <li class="nav-item dropdown {{ (request()->is('admin/filters*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-filter"></i>
                        <span>{{ trans('admin/main.filters') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_filters_list')
                            <li class="{{ (request()->is('admin/filters')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/filters">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_filters_create')
                            <li class="{{ (request()->is('admin/filters/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/filters/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @can('admin_reviews_lists')
                <li class="{{ (request()->is('admin/reviews')) ? 'active' : '' }}">
                    <a href="/admin/reviews" class="nav-link @if(!empty($sidebarBeeps['reviews']) and $sidebarBeeps['reviews']) beep beep-sidebar @endif">
                        <i class="fas fa-star"></i>
                        <span>{{ trans('admin/main.reviews') }}</span>
                    </a>
                </li>
            @endcan

            @if($authUser->can('admin_users') or
                $authUser->can('admin_roles') or
                $authUser->can('admin_users_not_access_content') or
                $authUser->can('admin_group') or
                $authUser->can('admin_users_badges') or
                $authUser->can('admin_become_instructors_list') or
                $authUser->can('admin_delete_account_requests')
            )
                <li class="menu-header">{{ trans('panel.users') }}</li>
            @endif

            @can('admin_users')
                <li class="nav-item dropdown {{ (request()->is('admin/staffs') or request()->is('admin/students') or request()->is('admin/instructors') or request()->is('admin/organizations')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i>
                        <span>{{ trans('admin/main.users_list') }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @can('admin_staffs_list')
                            <li class="{{ (request()->is('admin/staffs')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/staffs">{{ trans('admin/main.staff') }}</a>
                            </li>
                        @endcan()

                        @can('admin_users_list')
                            <li class="{{ (request()->is('admin/students')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/students">{{ trans('public.students') }}</a>
                            </li>
                        @endcan()

                        @can('admin_instructors_list')
                            <li class="{{ (request()->is('admin/instructors')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/instructors">{{ trans('home.instructors') }}</a>
                            </li>
                        @endcan()

                        @can('admin_organizations_list')
                            <li class="{{ (request()->is('admin/organizations')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/organizations">{{ trans('admin/main.organizations') }}</a>
                            </li>
                        @endcan()

                        @can('admin_users_create')
                            <li class="{{ (request()->is('admin/users/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/users/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan


            @can('admin_users_not_access_content_lists')
                <li class="{{ (request()->is('admin/users/not-access-to-content')) ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/users/not-access-to-content">
                        <i class="fas fa-user-lock"></i> <span>{{ trans('update.not_access_to_content') }}</span>
                    </a>
                </li>
            @endcan

            @can('admin_delete_account_requests')
                <li class="nav-item {{ (request()->is('admin/users/delete-account-requests*')) ? 'active' : '' }}">
                    <a href="/admin/users/delete-account-requests" class="nav-link">
                        <i class="fa fa-user-times"></i>
                        <span>{{ trans('update.delete-account-requests') }}</span>
                    </a>
                </li>
            @endcan

            @can('admin_roles')
                <li class="nav-item dropdown {{ (request()->is('admin/roles*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <span>{{ trans('admin/main.roles') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_roles_list')
                            <li class="{{ (request()->is('admin/roles')) ? 'active' : '' }}">
                                <a class="nav-link active" href="/admin/roles">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_roles_create')
                            <li class="{{ (request()->is('admin/roles/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/roles/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @can('admin_users_badges')
                <li class="{{ (request()->is('admin/users/badges')) ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/users/badges">
                        <i class="fas fa-trophy"></i>
                        <span>{{ trans('admin/main.badges') }}</span>
                    </a>
                </li>
            @endcan()



            @can('admin_become_instructors_list')
                <li class="nav-item dropdown {{ (request()->is('admin/users/become-instructors*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-list-alt"></i>
                        <span>{{ trans('admin/main.instructor_requests') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ (request()->is('admin/users/become-instructors/instructors')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/users/become-instructors/instructors">
                                <span>{{ trans('admin/main.instructors') }}</span>
                            </a>
                        </li>

                        <li class="{{ (request()->is('admin/users/become-instructors/organizations')) ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/users/become-instructors/organizations">
                                <span>{{ trans('admin/main.organizations') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan()

            @if(
                $authUser->can('admin_forum') or
                $authUser->can('admin_featured_topics')
                )
                <li class="menu-header">{{ trans('update.forum') }}</li>
            @endif

            @can('admin_forum')
                <li class="nav-item dropdown {{ (request()->is('admin/forums*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-comment-dots"></i>
                        <span>{{ trans('update.forums') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_forum_list')
                            <li class="{{ (request()->is('admin/forums')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/forums">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_forum_create')
                            <li class="{{ (request()->is('admin/forums/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/forums/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @can('admin_featured_topics')
                <li class="nav-item dropdown {{ (request()->is('admin/featured-topics*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-comment"></i>
                        <span>{{ trans('update.featured_topics') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_featured_topics_list')
                            <li class="{{ (request()->is('admin/featured-topics')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/featured-topics">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_featured_topics_create')
                            <li class="{{ (request()->is('admin/featured-topics/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/featured-topics/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @can('admin_recommended_topics')
                <li class="nav-item dropdown {{ (request()->is('admin/recommended-topics*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-thumbs-up"></i>
                        <span>{{ trans('update.recommended_topics') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_recommended_topics_list')
                            <li class="{{ (request()->is('admin/recommended-topics')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/recommended-topics">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()
                        @can('admin_recommended_topics_create')
                            <li class="{{ (request()->is('admin/recommended-topics/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/recommended-topics/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan()

            @if($authUser->can('admin_supports') or
                $authUser->can('admin_comments') or
                $authUser->can('admin_reports') or
                $authUser->can('admin_contacts') or
                $authUser->can('admin_noticeboards') or
                $authUser->can('admin_notifications')
            )
                <li class="menu-header">{{ trans('admin/main.crm') }}</li>
            @endif

            @can('admin_supports')
                <li class="nav-item dropdown {{ (request()->is('admin/supports*') and request()->get('type') != 'course_conversations') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-headphones"></i>
                        <span>{{ trans('admin/main.supports') }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @can('admin_supports_list')
                            <li class="{{ (request()->is('admin/supports')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/supports">{{ trans('public.tickets') }}</a>
                            </li>
                        @endcan

                        @can('admin_support_send')
                            <li class="{{ (request()->is('admin/supports/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/supports/create">{{ trans('admin/main.new_ticket') }}</a>
                            </li>
                        @endcan

                        @can('admin_support_departments')
                            <li class="{{ (request()->is('admin/supports/departments')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/supports/departments">{{ trans('admin/main.departments') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>

                @can('admin_support_course_conversations')
                    <li class="{{ (request()->is('admin/supports*') and request()->get('type') == 'course_conversations') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/supports?type=course_conversations">
                            <i class="fas fa-envelope-square"></i>
                            <span>{{ trans('admin/main.classes_conversations') }}</span>
                        </a>
                    </li>
                @endcan
            @endcan

            @can('admin_comments')
                <li class="nav-item dropdown {{ !request()->is('/admin/comments/products') and (request()->is('admin/comments*') and !request()->is('admin/comments/webinars/reports')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i> <span>{{ trans('admin/main.comments') }}</span></a>
                    <ul class="dropdown-menu">
                        @can('admin_webinar_comments')
                            <li class="{{ (request()->is('admin/comments/webinars')) ? 'active' : '' }}">
                                <a class="nav-link @if(!empty($sidebarBeeps['classesComments']) and $sidebarBeeps['classesComments']) beep beep-sidebar @endif" href="/admin/comments/webinars">{{ trans('admin/main.classes_comments') }}</a>
                            </li>
                        @endcan

                        @can('admin_blog_comments')
                            <li class="{{ (request()->is('admin/comments/blog')) ? 'active' : '' }}">
                                <a class="nav-link @if(!empty($sidebarBeeps['blogComments']) and $sidebarBeeps['blogComments']) beep beep-sidebar @endif" href="/admin/comments/blog">{{ trans('admin/main.blog_comments') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_reports')
                <li class="nav-item dropdown {{ (request()->is('admin/reports*') or request()->is('admin/comments/webinars/reports') or request()->is('admin/comments/blog/reports')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-info-circle"></i> <span>{{ trans('admin/main.reports') }}</span></a>

                    <ul class="dropdown-menu">
                        @can('admin_webinar_reports')
                            <li class="{{ (request()->is('admin/reports/webinars')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/reports/webinars">{{ trans('panel.classes') }}</a>
                            </li>
                        @endcan

                        @can('admin_webinar_comments_reports')
                            <li class="{{ (request()->is('admin/comments/webinars/reports')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/comments/webinars/reports">{{ trans('admin/main.classes_comments_reports') }}</a>
                            </li>
                        @endcan

                        @can('admin_blog_comments_reports')
                            <li class="{{ (request()->is('admin/comments/blog/reports')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/comments/blog/reports">{{ trans('admin/main.blog_comments_reports') }}</a>
                            </li>
                        @endcan

                        @can('admin_report_reasons')
                            <li class="{{ (request()->is('admin/reports/reasons')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/reports/reasons">{{ trans('admin/main.report_reasons') }}</a>
                            </li>
                        @endcan()

                        @can('admin_forum_topic_post_reports')
                            <li class="{{ (request()->is('admin/reports/forum-topics')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/reports/forum-topics">{{ trans('update.forum_topics') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan

            @can('admin_contacts')
                <li class="{{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/contacts">
                        <i class="fas fa-phone-square"></i>
                        <span>{{ trans('admin/main.contacts') }}</span>
                    </a>
                </li>
            @endcan

            @can('admin_noticeboards')
                <li class="nav-item dropdown {{ (request()->is('admin/noticeboards*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sticky-note"></i> <span>{{ trans('admin/main.noticeboard') }}</span></a>
                    <ul class="dropdown-menu">
                        @can('admin_noticeboards_list')
                            <li class="{{ (request()->is('admin/noticeboards')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/noticeboards">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan

                        @can('admin_noticeboards_send')
                            <li class="{{ (request()->is('admin/noticeboards/send')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/noticeboards/send">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_notifications')
                <li class="nav-item dropdown {{ (request()->is('admin/notifications*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span>{{ trans('admin/main.notifications') }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @can('admin_notifications_list')
                            <li class="{{ (request()->is('admin/notifications')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/notifications">{{ trans('public.history') }}</a>
                            </li>
                        @endcan

                        @can('admin_notifications_posted_list')
                            <li class="{{ (request()->is('admin/notifications/posted')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/notifications/posted">{{ trans('admin/main.posted') }}</a>
                            </li>
                        @endcan

                        @can('admin_notifications_send')
                            <li class="{{ (request()->is('admin/notifications/send')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/notifications/send">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan

                        @can('admin_notifications_templates')
                            <li class="{{ (request()->is('admin/notifications/templates')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/notifications/templates">{{ trans('admin/main.templates') }}</a>
                            </li>
                        @endcan

                        @can('admin_notifications_template_create')
                            <li class="{{ (request()->is('admin/notifications/templates/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/notifications/templates/create">{{ trans('admin/main.new_template') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_blog')
                <li class="nav-item dropdown {{ (request()->is('admin/blog*') and !request()->is('admin/blog/comments')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-rss-square"></i>
                        <span>{{ trans('admin/main.blog') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_blog_lists')
                            <li class="{{ (request()->is('admin/blog')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/blog">{{ trans('site.posts') }}</a>
                            </li>
                        @endcan

                        @can('admin_blog_create')
                            <li class="{{ (request()->is('admin/blog/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/blog/create">{{ trans('admin/main.new_post') }}</a>
                            </li>
                        @endcan

                        @can('admin_blog_categories')
                            <li class="{{ (request()->is('admin/blog/categories')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/blog/categories">{{ trans('admin/main.categories') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan()

            @can('admin_pages')
                <li class="nav-item dropdown {{ (request()->is('admin/pages*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-pager"></i>
                        <span>{{ trans('admin/main.pages') }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @can('admin_pages_list')
                            <li class="{{ (request()->is('admin/pages')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/pages">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()

                        @can('admin_pages_create')
                            <li class="{{ (request()->is('admin/pages/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/pages/create">{{ trans('admin/main.new_page') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan

            @can('admin_additional_pages')
                <li class="nav-item dropdown {{ (request()->is('admin/additional_page*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-circle"></i> <span>{{ trans('admin/main.additional_pages_title') }}</span></a>
                    <ul class="dropdown-menu">

                        @can('admin_additional_pages_404')
                            <li class="{{ (request()->is('admin/additional_page/404')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/additional_page/404">{{ trans('admin/main.error_404') }}</a>
                            </li>
                        @endcan()

                        @can('admin_additional_pages_contact_us')
                            <li class="{{ (request()->is('admin/additional_page/contact_us')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/additional_page/contact_us">{{ trans('admin/main.contact_us') }}</a>
                            </li>
                        @endcan()

                        @can('admin_additional_pages_footer')
                            <li class="{{ (request()->is('admin/additional_page/footer')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/additional_page/footer">{{ trans('admin/main.footer') }}</a>
                            </li>
                        @endcan()

                        @can('admin_additional_pages_navbar_links')
                            <li class="{{ (request()->is('admin/additional_page/navbar_links')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/additional_page/navbar_links">{{ trans('admin/main.top_navbar') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan

            @can('admin_testimonials')
                <li class="nav-item dropdown {{ (request()->is('admin/testimonials*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-address-card"></i>
                        <span>{{ trans('admin/main.testimonials') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_testimonials_list')
                            <li class="{{ (request()->is('admin/testimonials')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/testimonials">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()

                        @can('admin_testimonials_create')
                            <li class="{{ (request()->is('admin/testimonials/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/testimonials/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan

            @can('admin_tags')
                <li class="{{ (request()->is('admin/tags')) ? 'active' : '' }}">
                    <a href="/admin/tags" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span>{{ trans('admin/main.tags') }}</span>
                    </a>
                </li>
            @endcan()

            @can('admin_regions')
                <li class="nav-item dropdown {{ (request()->is('admin/regions*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-map-marked"></i>
                        <span>{{ trans('update.regions') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_regions_countries')
                            <li class="{{ (request()->is('admin/regions/countries')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/regions/countries">{{ trans('update.countries') }}</a>
                            </li>
                        @endcan()

                        @can('admin_regions_provinces')
                            <li class="{{ (request()->is('admin/regions/provinces')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/regions/provinces">{{ trans('update.provinces') }}</a>
                            </li>
                        @endcan()

                        @can('admin_regions_cities')
                            <li class="{{ (request()->is('admin/regions/cities')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/regions/cities">{{ trans('update.cities') }}</a>
                            </li>
                        @endcan()

                        @can('admin_regions_districts')
                            <li class="{{ (request()->is('admin/regions/districts')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/regions/districts">{{ trans('update.districts') }}</a>
                            </li>
                        @endcan()
                    </ul>
                </li>
            @endcan


            @can('admin_feature_webinars')
                <li class="nav-item dropdown {{ (request()->is('admin/webinars/features*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-star"></i>
                        <span>{{ trans('admin/main.feature_webinars') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_feature_webinars')
                            <li class="{{ (request()->is('admin/webinars/features')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/webinars/features">{{ trans('admin/main.lists') }}</a>
                            </li>
                        @endcan()

                        @can('admin_feature_webinars_create')
                            <li class="{{ (request()->is('admin/webinars/features/create')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/webinars/features/create">{{ trans('admin/main.new') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('admin_newsletters')
                <li class="nav-item dropdown {{ (request()->is('admin/newsletters*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-newspaper"></i>
                        <span>{{ trans('admin/main.newsletters') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('admin_newsletters_lists')
                            <li class="{{ (request()->is('admin/newsletters')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/newsletters">{{ trans('admin/main.list') }}</a>
                            </li>
                        @endcan

                        @can('admin_newsletters_send')
                            <li class="{{ (request()->is('admin/newsletters/send')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/newsletters/send">{{ trans('admin/main.send') }}</a>
                            </li>
                        @endcan

                        @can('admin_newsletters_history')
                            <li class="{{ (request()->is('admin/newsletters/history')) ? 'active' : '' }}">
                                <a class="nav-link" href="/admin/newsletters/history">{{ trans('public.history') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <li>
                <a class="nav-link" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ trans('admin/main.logout') }}</span>
                </a>
            </li>

        </ul>
        <br><br><br>
    </aside>
</div>
