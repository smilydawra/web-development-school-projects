import React from "react";

/**
 * function PostContent used to display post skeleton
 * accepts post as an argument
 */
const PostContent = ({ post }) => {
  return (
    <>
      <h3 className="mb-0">{post.post_title}</h3>
      <br />
      <small className="text-info">
        <strong>
          Posted by: {post.author_name}, {post.author_email}
        </strong>
      </small>
      <p>{post.body}</p>
    </>
  );
};

export default PostContent;
