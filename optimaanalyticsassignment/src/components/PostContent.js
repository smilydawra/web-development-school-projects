import React from 'react';

const PostContent = ({ post }) => {
  return (
    <>
      <h3 className='mb-0'>{post.post_title}</h3>
      <br />
      <small className='text-info'>
        <strong>
          Posted by: {post.author_name}, {post.author_email}
        </strong>
      </small>
      <p>{post.body}</p>
    </>
  );
};

export default PostContent;
