import React, { useState, useEffect } from 'react';
import postData from '../../server/db.json';
import './PostList.css';

const PostList = () => {
	const [posts, setPosts] = useState([])

	useEffect(() => {
		setPosts(postData.posts);
	}, []);

	return (
		<>
		<header>
		<nav className="navbar custom navbar-expand-lg navbar-light bg-light justify-content-between">
		  <a className="navbar-brand">Furniture Concepts</a>
		  <form className="form-inline">
		    <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
		    <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		  </form>
		</nav>
		</header>
		<main>
		<div className="container">
		<div className="mt-4">
			<img src="https://furniturerama.smilydawra.info/images/register.jpeg" className="img-fluid" />
		</div>
		<div>
		<h1 className="text-warning bg-white text-center">Recent Posts</h1>
		<button type="button" className="btn btn-primary mb-2 align-right">Add New Post</button>
		<table className="table table-light table-bordered">
			<thead className="thead-dark">
				<tr>
					<th>#</th>
					<th>Post</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
			{
				posts.map(post => (
					<tr>
						<td><h3>{post.id}</h3></td>
						<td><h3 className="mb-0">{post.post_title}</h3><br/><small className="text-info"><strong>Posted by: {post.author_name}, {post.author_email}</strong></small><br/> {post.body}</td>
						<td><button type="button" className="btn btn-warning">Reply</button></td>
						<td><button type="button" className="btn btn-danger">	&#128465;</button></td>
					</tr>

				))
			}
			</tbody>
		</table>
		</div>
		</div>
		</main>

		<footer class="page-footer font-small blue">

		  <div class="footer-copyright text-center py-3">© 2020 Copyright:
		    <a href="https://furniturerama.smilydawra.info/"> furniturerama.smilydawra.info</a>
		  </div>

		</footer>

		</>
	)
}

export default PostList;
