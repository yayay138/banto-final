select
c.id,
c.owner,
c.status,
c.photo,
c.title,
c.description,
c.category,
c.location,
sum(d.paymentamount) as collected,
c.targetfunding,
round((sum(d.paymentamount)*1.0/c.targetfunding)*100,2) as collected_percentage, 
count(d.paymentamount) as donaturs
from campaigns c inner join donations d on d.campaign_id = c.id
group by c.id;