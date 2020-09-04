import React, { useState, useEffect } from "react";
import { useHistory } from "react-router-dom";
import { NavLink } from "react-router-dom";

const Header = () => {
  const [searchQuery, setSearchQuery] = useState("");
  const history = useHistory();

  const onTypeSearchQuery = (event) => {
    setSearchQuery(event.target.value);
  };

  const submitSearchResult = ($event) => {
    $event.preventDefault();
    if (!searchQuery) {
      return;
    }
    history.push(`/search/${searchQuery}`);
  };

  return (
    <header>
      <nav className="navbar custom navbar-expand-lg navbar-light bg-light justify-content-between">
        <NavLink to="/" className="navbar-brand">
          Furniture Concepts
        </NavLink>
        <form className="form-inline">
          <input
            onChange={onTypeSearchQuery}
            className="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button
            className="btn btn-outline-success my-2 my-sm-0"
            onClick={submitSearchResult}
            type="submit"
          >
            Search
          </button>
        </form>
      </nav>
    </header>
  );
};

export default Header;
