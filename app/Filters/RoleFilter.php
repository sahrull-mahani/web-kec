<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null                         $params
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $params = null)
	{
		if (! function_exists('logged_in'))
		{
			helper('auth');
		}

		if (empty($params))
		{
			return;
		}

		// if no user is logged in then send to the login form
		if (!logged_in())
		{
			session()->set('redirect_url', current_url());
			return redirect('login');
		}

		// Check each requested permission
		foreach ($params as $group)
		{
			if(in_groups($group, user_id()))
			{
				return;
			}
		}
        $redirectURL = session('redirect_url') ?? '/home';
        unset($_SESSION['redirect_url']);
        // return redirect()->to('login')->with('error', lang('Auth.notEnoughPrivilege'));
        return redirect()->to($redirectURL)->with('error', lang('Auth.notEnoughPrivilege'));
		
	}

	//--------------------------------------------------------------------

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null                          $arguments
	 *
	 * @return void
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{

	}

	//--------------------------------------------------------------------
}
