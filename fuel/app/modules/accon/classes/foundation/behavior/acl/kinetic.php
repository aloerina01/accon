<?php
/**
 * Part of the kurobuta.jp.
 *
 * Copyright (c) 2015 Maemori Fumihiro
 * This software is released under the MIT License.
 * http://opensource.org/licenses/mit-license.php
 *
 * @version    1.0
 * @author     Maemori Fumihiro
 * @link       https://kurobuta.jp
 */

namespace Accon\Foundation;

/**
 * Class Behavior_Acl_Kinetic
 *
 * 物理的に存在しないコントローラ用のアクセス制御.
 */
class Behavior_Acl_Kinetic extends Behavior_Acl implements Interface_Acl
{
	/**
	 * アクセス権限をチェック
	 */
	public function has_access()
	{
		// アクセス制御処理にチェック対象を設定
		$this->set_area_name(mb_strtolower(\Config::get($this->get_area_name().'.publishing_point').'/'.\Request::active()->param('slug')));
		$this->set_permission_name(\Request::active()->param('action'));
		$this->set_action_name(ACTION_ROOT);
		// アクセス権限チェック
		$access = parent::has_access();
		if ($access === false) {
			// 権限なし
			\Session::set_flash('error', ERROR_UNAUTHORIZED_MESSAGE);
			\Response::redirect_back();
		}
	}

}