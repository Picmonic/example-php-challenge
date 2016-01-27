'use strict';

import React from 'react';
import ReactDOM from 'react-dom';
global.jQuery = require('jquery');
global.Tether = require('tether');
require('bootstrap');
const $ = jQuery;

import Commit from './commit.jsx';
import Error from '../App/error.jsx';

class Commits extends React.Component {

	constructor(props) {
		super(props);
		var repo = props.params.repository.split(':');
		this.state = { 
			user: repo[0],
			repository: repo[1],
			page: props.params.page,
			perPage: props.params.perPage,
			pageCount: 1,
			commits: []
		};
	}

	render() {
		var prevBtnClass = 'btn btn-block btn-warning';
		var nextBtnClass = 'btn btn-block btn-primary';

		var prevUrl = '/commits/' + this.state.user + ':' + this.state.repository + '/';
		var nextUrl = '/commits/' + this.state.user + ':' + this.state.repository + '/';
		if(this.state.page <= 1) { 
			prevBtnClass += ' hidden';
			prevUrl += 1;
		} else { 
			prevUrl += this.state.page - 1;
		}
		if(this.state.pageCount <= this.state.page) { 
			nextBtnClass += ' hidden'; 
			nextUrl += 1;
		} else {
			nextUrl += (this.state.page + 1);
		}
		prevUrl += '/' + this.state.perPage;
		nextUrl += '/' + this.state.perPage;

		var errorMessage = '';
		if(this.state.error) {
			errorMessage = <Error>{this.state.error}</Error>;
		}

		return (
			<div className="main container commits-container">
				<div className="row">
					<div className="col-xs-12">
						<h1>Commit Overview for {this.state.user} / {this.state.repository}</h1>
						<h4>Page {this.state.page} of {this.state.pageCount}</h4>
						{errorMessage}
						<div id="commits" className="list-group">
							{this.state.commits.map((commit) => {
								return <Commit key={commit.sha} {...commit} />;
							})}
						</div>
						<hr/>
					</div>
				</div>
				<div className="row">
					<div className="col-xs-6">
						<a href={prevUrl} id="previous" className={prevBtnClass}>
							Previous Page
						</a>
					</div>
					<div className="col-xs-6">
						<a href={nextUrl} id="next" className={nextBtnClass}>
							Next Page
						</a>
					</div>
				</div>
			</div>
		);
	}

	componentDidMount() {
		var parts = this.state.repository.split('/');
		var user = parts[0];
		var repo = parts[1];
		// Hit the localized PHP API
		var postData = {
			user: this.state.user,
			repository: this.state.repository,
			perPage: this.state.perPage,
			page: this.state.page
		};
		jQuery.post({
			url: '/api/commits',
			data: postData,
			success: ((res) => {
				this.setState({
					commits: res.data,
					page: res.current_page,
					perPage: res.per_page,
					pageCount: res.last_page
				});
			}).bind(this),
			error: ((err) => {
				console.log(err);
				this.setState({
					commits: [],
					error: 'Unable to query repository. Perhaps it is private?',
					page: 1,
					pageCount: 1
				})
			}),
			dataType: 'json'
		});

		/* If we didn't need to save to the database we could just:
		jQuery.get({
			url: 'https://api.github.com/repos/' + repo + '/commits',
			success: (res) => {
				console.log(res);
			},
			dataType: 'json'
		});
		*/
	}
}

export default Commits;