import React, { useState, useEffect, useContext } from "react";
import { PostContext } from "../context/PostContext";
import ReplyPost from "./ReplyPost";
import PostContent from "./PostContent";
import { NavLink } from "react-router-dom";

const PostList = () => {
  const [posts, setPosts] = useState([]);

  const { state, deletePost } = useContext(PostContext);

  const [activeReply, setActiveReply] = useState();

  useEffect(() => {
    setPosts(state.posts);
  }, [state.posts, state.replies]);

  const replyByPost = (postId) =>
    state.replies.filter((reply) => +reply.post_id === +postId);

  const replyToPost = (postId) => {
    setActiveReply(postId);
  };

  const onReplySuccess = () => {
    setActiveReply();
  };

  return (
    <>
      <h1 className="text-warning bg-white text-center">Recent Posts</h1>
      <NavLink
        to="/create"
        type="button"
        className="btn btn-primary mb-2 align-right"
      >
        Add New Post
      </NavLink>
      <table className="table table-light table-bordered">
        <thead className="thead-dark">
          <tr>
            <th>#</th>
            <th>Post</th>
            <th colSpan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          {posts.map((post) => (
            <tr key={post.id}>
              <td>
                <h3>{post.id}</h3>
              </td>
              <td>
                <PostContent post={post} />
                {activeReply === post.id && (
                  <ReplyPost postId={post.id} replySuccess={onReplySuccess} />
                )}{" "}
                <div className="reply-container">
                  <small>
                    {!replyByPost(post.id).length
                      ? ""
                      : replyByPost(post.id).map((rep) => (
                          <div className="reply" key={rep.id}>
                            <strong>Reply By: &nbsp;</strong>
                            <span class="mb-0">
                              &#128100; {rep.name}, &#128231; {rep.email}
                            </span>
                            <br />
                            <div>{rep.reply}</div>
                            <hr />
                          </div>
                        ))}
                  </small>
                </div>
              </td>
              <td>
                <button
                  type="button"
                  className="btn btn-warning"
                  onClick={() => replyToPost(post.id)}
                >
                  Reply
                </button>
              </td>
              <td>
                <button
                  onClick={() => deletePost(post.id)}
                  type="button"
                  className="btn btn-danger"
                >
                  {" "}
                  &#128465;
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </>
  );
};

export default PostList;
