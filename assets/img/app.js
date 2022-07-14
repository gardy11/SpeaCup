import React, { Component, useState } from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import CateOne from './components/cateOne';
import Home from './components/home';
import CatTwo from './components/cateTwo';
import CateThree from './components/cateThree'
import Navigation from './components/Navigation';


class App extends Component {
  state = {  } 

  render() { 
    
    return (
      <React.Fragment >
        

        <div >
        
          <BrowserRouter >
          <div>
                <Navigation />
                
                <Switch>
                <Route path="/" component={Home} exact/>
                <Route path="/CatTwo" component={CatTwo}/>
                <Route path="/CateThree" component={CateThree}/>
                <Route path="/CateOne" component={CateOne}/>
              </Switch>
            </div> 
          </BrowserRouter>
        </div>
     </React.Fragment>