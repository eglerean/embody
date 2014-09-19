function showpaint(a)
S=length(a);
base=imread('base.png');


for n=1:S
    disp(num2str(n))
    T=length(a(n).paint(:,2));
    over=zeros(size(base,1),size(base,2));

    for t=1:T
        over(ceil(a(n).paint(t,3)+1),ceil(a(n).paint(t,2)+1))=over(ceil(a(n).paint(t,3)+1),ceil(a(n).paint(t,2)+1))+1;
    end
    
    figure(100+n);
    imagesc(base);
    hold on
    h=fspecial('gaussian',[11 11],5);
    over=imfilter(over,h);
    fh=imagesc(over,[0 0.5]);
    mask=ones(size(over));
    mask(find(over==0))=0;
    set(fh,'AlphaData',mask)
end
