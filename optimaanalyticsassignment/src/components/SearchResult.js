import React, { useContext, useEffect, useState } from 'react';
import { PostContext } from '../context/PostContext';
import PostContent from './PostContent';
import { NavLink } from 'react-router-dom';

const SearchResult = (props) => {
  const [searchResults, setSearchResults] = useState([]);
  const { state } = useContext(PostContext);

  useEffect(() => {
    const searchQuery = props.match.params.search;
    const posts = state.posts;
    searchPost(posts, searchQuery);
  }, [props.match.params.search]);

  const searchPost = (allPosts, searchQuery) => {
    const filteredPosts = allPosts.filter((post) => {
      const postTitle = post.post_title.toLowerCase();
      if (postTitle.includes(searchQuery.toLowerCase())) {
        return post;
      }
    });
    setSearchResults(filteredPosts);
  };

  return (
    <div className='mt-4'>
      <h1>Search Results</h1>
	  <NavLink to="/" type="button" className="btn btn-success mb-2 align-right">Back to Posts</NavLink>
      <hr />
      {!searchResults.length ? (
        <p>No Results found</p>
      ) : (
        searchResults.map((post) => (
          <div key={post.id}>
            <PostContent post={post} />
            <hr />
          </div>
        ))
      )}
    </div>
  );
};

export default SearchResult;
