import React from 'react';
import PostList from './components/PostList/PostList';
import CreatePost from './components/CreatePost';
import Header from './components/Header';
import Footer from './components/Footer';
import Banner from './components/Banner';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import './App.css';


function App() {
  return (
	  <BrowserRouter>
	  <Header/>
	  <main>
	  <div className="container">
	  <Banner/>
	  <Switch>
	  <Route path="/" exact component={PostList}></Route>
	  <Route path="/create" exact component={CreatePost}></Route>
  	  </Switch>
	  </div>
	  </main>
	  <Footer/>
	  </BrowserRouter>
  )
}

export default App;
