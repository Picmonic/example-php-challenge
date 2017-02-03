import { PicmonicPage } from './app.po';

describe('picmonic App', function() {
  let page: PicmonicPage;

  beforeEach(() => {
    page = new PicmonicPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
