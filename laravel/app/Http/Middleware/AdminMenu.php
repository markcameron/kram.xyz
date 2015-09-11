<?php namespace App\Http\Middleware;

use Closure;
use Menu\Menu;

class AdminMenu {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    // Loop through every item in the menu and build
    foreach ($this->menuItems() as $item) {
      $class = "";
      $child_items = Menu::items($item['url']);
      if (!empty($item['children'])) {
        $class = 'treeview';
        foreach ($item['children'] as $child) {
          $child_items->add($child['url'], $this->format_text($child));
        }
      }

      Menu::handler('admin')->add($item['url'], $this->format_text($item), $child_items, [], ['class' => $class]);
    }

    Menu::handler('admin')
      ->getItemListsAtDepth(1)
      ->addClass('treeview-menu')
      ->map(function($item) {
        if ($item->isActive()) {
          $item->addClass('menu-open');
        }
      });

    return $next($request);
  }

  /**
   * Format the text with all required icons to place inside the
   *
   * @param $item array
   *
   * @return
   */
  private function format_text($item) {
    $children_toggle = '';

    // If we have children elements add the < to show taggle possibility
    if (!empty($item['children'])) {
      $children_toggle = '<i class="fa pull-right fa-angle-left"></i>';
    }

    // If there is an icon, use the given one
    if (isset($item['icon'])) {
      return '<i class="fa fa-' . $item['icon'] . '"></i><span>' . $item['text'] . '</span>' . $children_toggle;
    }

    // Otherwise use basic >> icon
    return '<i class="fa fa-circle-o"></i><span>' . $item['text'] . '</span>' . $children_toggle;
  }

  /**
   * Setup the array with all the menu entries in here
   *
   * @return
   */
  private function menuItems() {
    return array(

      array(
        'url' => route('admin.requests.index'),
        'text' => trans('menus.admin.requests'),
        'icon' => 'list',
        'children' => array(
        ),
      ),

      array(
        'url' => '#',
        'text' => trans('menus.admin.content'),
        'icon' => 'file',
        'children' => array(
          array(
            'url' => route('admin.pages.index'),
            'text' => trans('admin.content.pages'),
          ),
        ),
      ),

      array(
        'url' => '#',
        'text' => trans('menus.admin.users'),
        'icon' => 'users',
        'children' => array(
          array(
            'url' => route('admin.users.index'),
            'text' => trans('menus.admin.users_manage'),
          ),
          array(
            'url' => route('admin.roles.index'),
            'text' => trans('menus.admin.roles'),
          ),
        ),
      ),

      array(
        'url' => '#',
        'text' => trans('menus.admin.configuration'),
        'icon' => 'gear',
        'children' => array(
          /*
            array(
            'url' => url('admin/translations'),
            'text' => Lang::get('menus.admin.config_translations'),
            ),
          */
          array(
            'url' => url('admin/variables'),
            'text' => trans('menus.admin.config_variables'),
          ),
        ),
      ),

      array(
        'url' => url('admin/logs'),
        'text' => trans('menus.admin.logs'),
        'icon' => 'bug',
        'children' => array(
        ),
      ),

    );
  }

}