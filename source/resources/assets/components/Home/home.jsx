'use strict';

import React from 'react';

import Error from '../App/error.jsx';

class Home extends React.Component {
	render() {
		return (
			<div className="home-container container">
				<div className="row">
					<div className="col-xs-12">
						<h1>GitHub Repo Browser</h1>
						<p>Enter a repository path below to browse the commit history!</p>
						<hr/>
						<div className="jumbotron">
							<form id="repo-form">
								<fieldset className="form-group col-xs-6">
									<label for="name">Repository Name</label>
									<input type="text" className="form-control" 
										name="name" id="repo-name" defaultValue="nodejs/node" />
								</fieldset>
								<fieldset className="form-group col-xs-3">
									<label for="perPage"># of Commits to Display</label>
									<input type="number" className="form-control" 
										name="perPage" id="repo-perpage" defaultValue="25" />
								</fieldset>
								<div className="col-xs-3">
									<button type="submit" className="btn btn-primary btn-block m-t">
										Go!
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		);
	}

	componentDidMount() {
		var form = document.getElementById('repo-form');
		form.onsubmit = () => {
			var name = form.elements['name'].value;
			var perPage = form.elements['perPage'].value;
			if(name && perPage) {
				name = name.replace('/', ':');
				if(perPage < 20) perPage = 20;
				if(perPage > 100) perPage = 100;
				var url = '/commits/' + name + '/1/' + perPage;
				window.location.href = url;
			} else {
				form.prependChild(<Error>Invalid repository or commit count provided!</Error>);
			}
			return false;
		};
	}
}

export default Home;