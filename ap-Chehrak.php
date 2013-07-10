<?php
/*
	Plugin Name:	AP Chehrak
	Plugin URI:		http://chehrak.com
	Description:	A simple plugin that adds the Chehrak photo associated with the user's email to their profile page. If they do not have a chehrak account, it displays a link to create one. MultiSite compatable!

	Version: 		1.0
	Author: 		Masoud Amini
	Author URI: 	http://haftir.ir
	License: 		GPL2
*/

/*  Copyright 2013 Masoud Amini 

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Add to Profile page
	function ap_chehrak_options($user){
?>
			<h3>Profile Picture</h3>
			
			<table class="form-table">
				<tr>
					<th><label>Your profile picture</label></th>
					<td width="100">
<?php
		
		$source = 'http://rokh.chehrak.com/';
		$default = '';
		$size = '128';
		$chehrak_query_str = '?size=' . $size;

		global $profileuser;
		$id = $profileuser->ID;
		$email = $profileuser->user_email;
		$name = $profileuser->display_name;
		
		$src = $source;
		$src .= md5(strtolower($email));
		$src .= $chehrak_query_str;

		$avatar = "<img src='$src' class='avatar avatar-$size' alt='$name' height='$size' width='$size' />";
		
		echo($avatar);
?>
					</td>
					<td><?php // echo "<span class='description'>$id &bull; $name &bull; $email</span><br>"; ?>
						Your Chehrak is an image that follows you from site to site appearing<br/>
						beside your name when you do things like comment or post on a blog.
						<br/><br/>
						We use Chehraks to display your profile picture. If you do not have a<br/>
						Chehrak you can sign up at <a href="http://Chehrak.com">Chehrak.com</a> to have a picture of <br/>
						yourself appear not only here, but on all sorts of other sites!
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<td>
							<a class="button" href="http://Chehrak.com/" target="_blank">Get your Chehrak today &raquo;</a>
					</td>
				</tr>
			</table>

<?php	
	}


// Hook
add_action('show_user_profile', 'ap_Chehrak_options');
add_action('edit_user_profile', 'ap_Chehrak_options');


?>
