import React, { useState, useEffect } from 'react';
import postData from '../../server/db.json';
import './PostList.css';

const PostList = () => {
	const [posts, setPosts] = useState([])

	useEffect(() => {
		setPosts(postData.posts);
	}, []);

	return (
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Author</th>
					<th>Post</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			{
				posts.map(post => (
					<tr>
						<td>{post.id}</td>
						<td>{post.post_title}</td>
						<td>{post.author_name} <br/> {post.author_email}</td>
						<td>{post.body}</td>
						<td><button>Edit</button></td>
						<td><button>	&#128465;</button></td>
					</tr>
				))
			}
			</tbody>
		</table>
	)
}

export default PostList;
