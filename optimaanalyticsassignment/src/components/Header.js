import React from 'react';

const Header = () => {

	return (
		<header>
		<nav className="navbar custom navbar-expand-lg navbar-light bg-light justify-content-between">
		  <a className="navbar-brand">Furniture Concepts</a>
		  <form className="form-inline">
		    <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
		    <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>
		</nav>
		</header>
		
	)
}

export default Header;
