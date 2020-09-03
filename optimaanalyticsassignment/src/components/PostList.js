import React, { useState, useEffect, useContext } from 'react';
import { PostContext } from '../context/PostContext';
import { NavLink } from 'react-router-dom';

const PostList = () => {
	const [posts, setPosts] = useState([]);

	const { state, deletePost } = useContext(PostContext);

	useEffect(() => {
		setPosts(state.posts);
	}, [state.posts]);

	return (
		<>
		<h1 className="text-warning bg-white text-center">Recent Posts</h1>
		<NavLink to="/create" type="button" className="btn btn-primary mb-2 align-right">Add New Post</NavLink>
		<table className="table table-light table-bordered">
			<thead className="thead-dark">
				<tr>
					<th>#</th>
					<th>Post</th>
					<th colSpan="2">Action</th>
				</tr>
			</thead>
			<tbody>
			{
				posts.map(post => (
					<tr key={post.id}>
						<td><h3>{post.id}</h3></td>
						<td><h3 className="mb-0">{post.post_title}</h3><br/><small className="text-info"><strong>Posted by: {post.author_name}, {post.author_email}</strong></small><br/> {post.body}</td>
						<td><NavLink to="/reply" type="button" className="btn btn-warning">Reply</NavLink></td>
						<td><button onClick={() => deletePost(post.id)} type="button" className="btn btn-danger">	&#128465;</button></td>
					</tr>

				))
			}
			</tbody>
		</table>
	</>
	)
}

export default PostList;
