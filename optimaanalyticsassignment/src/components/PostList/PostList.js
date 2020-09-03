import React, { useState, useEffect } from 'react';
import postData from '../../server/db.json';
import { NavLink } from 'react-router-dom';
import './PostList.css';

const PostList = () => {
	const [posts, setPosts] = useState([])

	useEffect(() => {
		setPosts(postData.posts);
	}, []);

	return (
		<>
		<h1 className="text-warning bg-white text-center">Recent Posts</h1>
		<NavLink to="/create" type="button" className="btn btn-primary mb-2 align-right">Add New Post</NavLink>
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
						<td><NavLink to="/reply" type="button" className="btn btn-warning">Reply</NavLink></td>
						<td><button type="button" className="btn btn-danger">	&#128465;</button></td>
					</tr>

				))
			}
			</tbody>
		</table>
	</>
	)
}

export default PostList;
